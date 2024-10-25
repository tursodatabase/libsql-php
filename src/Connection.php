<?php

declare(strict_types=1);

namespace Libsql;

use ffi\libsql_connection_t;

class Connection
{
    use Prepareable;

    /** @internal */
    public function __construct(protected libsql_connection_t $inner)
    {
    }

    /**
     * @internal
     *
     * @return void
     */
    public function __destruct()
    {
        libsqlFFI()->libsql_connection_deinit($this->inner);
    }

    /**
     * Execute batch statements.
     */
    public function executeBatch(string $sql): void
    {
        $batch = libsqlFFI()->libsql_connection_batch($this->inner, $sql);
        errorIf($batch->err);
    }

    /**
     * Prepare statement with the given query.
     */
    #[\Override]
    public function prepare(string $sql): Statement
    {
        $stmt = libsqlFFI()->libsql_connection_prepare($this->inner, $sql);
        errorIf($stmt->err);

        return new Statement($stmt);
    }

    /**
     * Begin a transaction.
     */
    public function transaction(): Transaction
    {
        $tx = libsqlFFI()->libsql_connection_transaction($this->inner);
        errorIf($tx->err);

        return new Transaction($tx);
    }
}
