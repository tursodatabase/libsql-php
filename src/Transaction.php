<?php

declare(strict_types=1);

namespace Libsql;

use FFI\CData;

class Transaction
{
    use Prepareable;

    /** @internal */
    public function __construct(protected CData $inner)
    {
    }

    /**
     * Execute batch statements.
     *
     * @param string $sql
     *
     * @return void
     */
    public function executeBatch(string $sql): void
    {
        $batch = getFFI()->libsql_transaction_batch($this->inner, $sql);
        errIf($batch->err);
    }

    /**
     * Prepare statement with the given query in a transaction.
     *
     * @param string $sql
     *
     * @return Statement
     */
    #[\Override]
    public function prepare(string $sql): Statement
    {
        $stmt = getFFI()->libsql_transaction_prepare($this->inner, $sql);
        errIf($stmt->err);

        return new Statement($stmt);
    }

    /**
     * Commit a transaction.
     *
     * @return void
     */
    public function commit(): void
    {
        getFFI()->libsql_transaction_commit($this->inner);
    }

    /**
     * Rollback a transaction.
     *
     * @return void
     */
    public function rollback(): void
    {
        getFFI()->libsql_transaction_rollback($this->inner);
    }

}
