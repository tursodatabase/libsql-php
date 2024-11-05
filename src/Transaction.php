<?php

declare(strict_types=1);

namespace Libsql;

use ffi\libsql_transaction_t;

class Transaction
{
    use Prepareable;

    /** @internal */
    public function __construct(protected libsql_transaction_t $inner)
    {
    }

    /**
     * Execute batch statements.
     */
    public function executeBatch(string $sql): void
    {
        $batch = libsqlFFI()->libsql_transaction_batch($this->inner, $sql);
        errorIf($batch->err);
    }

    /**
     * Prepare statement with the given query in a transaction.
     */
    #[\Override]
    public function prepare(string $sql): Statement
    {
        $stmt = libsqlFFI()->libsql_transaction_prepare($this->inner, $sql);
        errorIf($stmt->err);

        return new Statement($stmt);
    }

    /**
     * Commit a transaction.
     */
    public function commit(): void
    {
        libsqlFFI()->libsql_transaction_commit($this->inner);
    }

    /**
     * Rollback a transaction.
     */
    public function rollback(): void
    {
        libsqlFFI()->libsql_transaction_rollback($this->inner);
    }
}
