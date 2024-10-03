<?php

declare(strict_types=1);

namespace Libsql;

use FFI\CData;

class Connection
{
    use Prepareable;

    /** @internal */
    public function __construct(protected CData $inner)
    {
    }

    /**
     * @internal
     * @return void
     */
    public function __destruct()
    {
        getFFI()->libsql_connection_deinit($this->inner);
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
        $batch = getFFI()->libsql_connection_batch($this->inner, $sql);
        errIf($batch->err);
    }

    /**
     * Prepare statement with the given query.
     *
     * @param string $sql
     *
     * @return Statement
     */
    #[\Override]
    public function prepare(string $sql): Statement
    {
        $stmt = getFFI()->libsql_connection_prepare($this->inner, $sql);
        errIf($stmt->err);

        return new Statement($stmt);
    }

    /**
     * Begin a transaction.
     *
     * @return Transaction
     */
    public function transaction(): Transaction
    {
        $tx = getFFI()->libsql_connection_transaction($this->inner);
        errIf($tx->err);

        return new Transaction($tx);
    }
}
