<?php

namespace Libsql;

class PDO extends \PDO
{
    private ?Transaction $tx;
    private ?Connection $conn;
    private bool $in_transaction;
    private Database $db;

    public function __construct(
        string $dsn = null,
        ?string $username = null,
        #[\SensitiveParameter] ?string $password = null,
        #[\SensitiveParameter] ?array $options = [],
    ) {
        $this->db = new Database(
            url: $dsn,
            path: $dsn,
            authToken: $password,
            webpki: $options["webpki"],
            syncInterval: $options["syncInterval"],
            readYourWrites: $options["readYourWrites"],
        );

        $this->conn = $this->db->connect();
    }

    public function inTransaction(): bool
    {
        return $this->in_transaction;
    }

    public function beginTransaction(): bool
    {
        if ($this->inTransaction()) {
            throw new \PDOException("Already in a transaction");
        }

        $this->in_transaction = true;
        $this->tx = $this->conn->transaction();

        return true;
    }

    public function commit(): bool
    {
        if (!$this->inTransaction()) {
            throw new \PDOException("No active transaction");
        }

        $this->tx->commit();
        $this->in_transaction = false;

        return true;
    }

    public function rollback(): bool
    {
        if (!$this->inTransaction()) {
            throw new \PDOException("No active transaction");
        }

        $this->tx->rollback();
        $this->in_transaction = false;

        return true;
    }

    public function prepare(string $query, array $options = []): PDOStatement|false
    {
        return new PDOStatement(
            ($this->inTransaction() ? $this->tx : $this->conn)->prepare()
        );
    }

    public function errorCode(): ?string
    {
        throw new \Exception('Not implemented');
    }

    public function errorInfo(): array
    {
        throw new \Exception('Not implemented');
    }

    public function lastInsertId(?string $name = null): string|false
    {
        return $this->conn->lastInsertId();
    }

    public function exec(string $statement): int|false
    {
        return ($this->inTransaction() ? $this->tx : $this->conn)->execute($statement);
    }

    public function quote($input, int $type = PDO::PARAM_STR): string
    {
        if ($input === null) {
            return 'NULL';
        }

        return "'".\SQLite3::escapeString($input)."'";
    }
}
