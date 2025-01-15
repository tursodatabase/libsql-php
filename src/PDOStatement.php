<?php

declare(strict_types=1);

namespace Libsql;

class PDOStatement extends \PDOStatement
{
    private string $query;
    private ?array $rows = null;
    private ?int $affectedRows = null;
    private ?int $mode = PDO::FETCH_BOTH;

    public function __construct(private Statement $statement, string $query, private Connection $conn)
    {
        $this->query = $query;
    }

    public function fetch(int $mode = PDO::FETCH_DEFAULT, ...$args): mixed
    {
        if ($mode === PDO::FETCH_DEFAULT) {
            $mode = $this->mode;
        }

        if (!$this->rows) {
            return false;
        }

        $row = array_shift($this->rows);
        $rowValues = array_values($row);

        return match ($mode) {
            PDO::FETCH_BOTH => array_merge($row, $rowValues),
            PDO::FETCH_ASSOC, PDO::FETCH_NAMED => $row,
            PDO::FETCH_NUM => $rowValues,
            PDO::FETCH_OBJ => (object) $row,
            default => throw new \PDOException('Unsupported fetch mode.'),
        };
    }

    public function fetchAll(int $mode = PDO::FETCH_DEFAULT, ...$args): array
    {
        if ($mode === PDO::FETCH_DEFAULT) {
            $mode = $this->mode;
        }

        if (is_null($this->rows)) {
            return [];
        }

        $allRows = $this->rows;
        $rowValues = \array_map('array_values', $allRows);

        return match ($mode) {
            PDO::FETCH_BOTH => array_merge($allRows, $rowValues),
            PDO::FETCH_ASSOC, PDO::FETCH_NAMED => $allRows,
            PDO::FETCH_NUM => $rowValues,
            PDO::FETCH_OBJ => array_map(function ($row) { return (object) $row; }, $allRows),
            default => throw new \PDOException('Unsupported fetch mode.'),
        };
    }

    public function bindValue(string|int $param, mixed $value, int $type = PDO::PARAM_STR): bool
    {
        $v = match ($type) {
            PDO::PARAM_STR => strval($value),
            PDO::PARAM_INT => intval($value),
        };

        $this->statement->bind([$param => $v]);
        return true;
    }

    public function execute(?array $params = null): bool
    {
        $this->statement->bind($params ?? []);
        // TODO: Fix columnCount for remote.
        if ($this->columnCount() > 0 || preg_match('/^select/i', $this->query)) {
            $query = $this->statement->query();
            $this->rows = $query->fetchArray();
        } else {
            $this->affectedRows = $this->statement->execute();
        }

        $this->statement->reset();

        return true;
    }

    public function columnCount(): int
    {
        return $this->statement->columnCount();
    }

    public function getAffectedRows(): int
    {
        return $this->affectedRows;
    }

    public function rowCount(): int
    {
        return $this->affectedRows;
    }

    public function nextRowset(): bool
    {
        return false;
    }

    public function setFetchMode(int $mode, mixed ...$args): bool
    {
        $this->mode = $mode;

        return true;
    }
}
