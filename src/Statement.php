<?php

declare(strict_types=1);

namespace Libsql;

use FFI\CData;

class Statement
{
    /** @internal */
    public function __construct(protected CData $inner)
    {
    }

    /**
     * @internal
     *
     * @return void
     */
    public function __destruct()
    {
        getFFI()->libsql_statement_deinit($this->inner);
    }

    /**
     * Execute statement.
     *
     * @return void
     */
    public function execute(): int
    {
        $ffi = getFFI();
        $exec = $ffi->libsql_statement_execute($this->inner);
        errIf($exec->err);

        return $exec->rows_changed;
    }

    /**
     * Query statement.
     *
     * @return Rows
     */
    public function query(): Rows
    {
        $ffi = getFFI();
        $rows = $ffi->libsql_statement_query($this->inner);
        errIf($rows->err);

        return new Rows($rows);
    }

    /**
     * Bind parameters to statement, mixing positional and named parameters is
     * not supported. This returns $this to allow chaining bind and query.
     *
     * @param array<int,mixed>|array<string,mixed> $params
     *
     * @return Statement
     */
    public function bind(array $params): Statement
    {
        $ffi = getFFI();

        foreach ($params as $key => $value) {
            if (is_null($value)) {
                $value = $ffi->libsql_null();

                $bind = match (gettype($key)) {
                    'string' => $ffi->libsql_statement_bind_named($this->inner, $key, $value),
                    'integer' => $ffi->libsql_statement_bind_value($this->inner, $value),
                };

                errIf($bind->err);
            } elseif (is_int($value)) {
                $value = $ffi->libsql_integer($value);

                $bind = match (gettype($key)) {
                    'string' => $ffi->libsql_statement_bind_named($this->inner, $key, $value),
                    'integer' => $ffi->libsql_statement_bind_value($this->inner, $value),
                };
                errIf($bind->err);
            } elseif (is_double($value)) {
                $value = $ffi->libsql_real($value);

                $bind = match (gettype($key)) {
                    'string' => $ffi->libsql_statement_bind_named($this->inner, $key, $value),
                    'integer' => $ffi->libsql_statement_bind_value($this->inner, $value),
                };
                errIf($bind->err);
            } elseif (is_string($value)) {
                $cValue = new CharBox($value, $ffi);
                $value = $ffi->libsql_text($cValue->ptr, $cValue->len);

                $bind = match (gettype($key)) {
                    'string' => $ffi->libsql_statement_bind_named($this->inner, $key, $value),
                    'integer' => $ffi->libsql_statement_bind_value($this->inner, $value),
                };

                try {
                    errIf($bind->err);
                } finally {
                    $cValue->destroy();
                }
            } elseif ($value instanceof Blob) {
                $cValue = new CharBox($value->blob);
                $value = $ffi->libsql_blob(
                    $ffi->cast("uint8_t *", $ffi::addr($cValue->ptr)),
                    $cValue->len - 1,
                );

                $bind = match (gettype($key)) {
                    'string' => $ffi->libsql_statement_bind_named($this->inner, $key, $value),
                    'integer' => $ffi->libsql_statement_bind_value($this->inner, $value),
                };

                try {
                    errIf($bind->err);
                } finally {
                    $cValue->destroy();
                }
            } else {
                throw new InvalidArgumentException();
            }
        }

        return $this;
    }
}
