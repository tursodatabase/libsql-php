<?php

declare(strict_types=1);

namespace Libsql;

trait Prepareable
{
    abstract public function prepare(string $sql): Statement;

    /**
     * Query with parameters.
     *
     * @param array<int,mixed>|array<string,mixed> $params (default: [])
     */
    public function query(string $sql, array $params = []): Rows
    {
        return $this->prepare($sql)->bind($params)->query();
    }

    /**
     * Execute with parameters.
     *
     * @param array<int,mixed>|array<string,mixed> $params (default: [])
     *
     * @return int Rows changed
     */
    public function execute(string $sql, array $params = []): int
    {
        return $this->prepare($sql)->bind($params)->execute();
    }
}
