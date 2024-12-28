<?php

namespace Libsql;

class PDOStatement extends \PDOStatement
{
    private ?array $rows = null;
    private ?int $affectedRows = null;
    private ?int $mode = null;

    public function __construct(private Statement $statement)
    {
    }

    public function fetch(int $mode = PDO::FETCH_DEFAULT, ...$args): array
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
            return false;
        }

        $allRows = $this->rows;
        $rowValues = \array_map('array_values', $allRows);

        return match ($mode) {
            PDO::FETCH_BOTH => array_merge($allRows, $rowValues),
            PDO::FETCH_ASSOC, PDO::FETCH_NAMED => $allRows,
            PDO::FETCH_NUM => $rowValues,
            PDO::FETCH_OBJ => $allRows,
            default => throw new \PDOException('Unsupported fetch mode.'),
        };
    }

    public function bindValue(string|int $param, mixed $value, int $type = PDO::PARAM_STR): bool
    {
        $this->statement->bind([$param => $value]);
        return true;
    }

    public function execute(?array $params = null): bool
    {
        $this->statement->bind($params ?? []);

        if ($this->columnCount() > 0) {
            $this->rows = $this->statement->query()->fetchArray();
        } else {
            $this->affectedRows = $this->statement->execute();
        }

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
