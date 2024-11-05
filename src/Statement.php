<?php

declare(strict_types=1);

namespace Libsql;

use ffi\libsql_statement_t;
use ffi\string_;
use ffi\uint8_t_ptr;

class Statement
{
    /** @internal */
    public function __construct(protected libsql_statement_t $inner)
    {
    }

    /**
     * @internal
     *
     * @return void
     */
    public function __destruct()
    {
        libsqlFFI()->libsql_statement_deinit($this->inner);
    }

    /**
     * Execute statement.
     */
    public function execute(): int
    {
        $exec = libsqlFFI()->libsql_statement_execute($this->inner);
        errorIf($exec->err);

        return $exec->rows_changed;
    }

    /**
     * Query statement.
     */
    public function query(): Rows
    {
        $rows = libsqlFFI()->libsql_statement_query($this->inner);
        errorIf($rows->err);

        return new Rows($rows);
    }

    /**
     * Bind parameters to statement, mixing positional and named parameters is
     * not supported. This returns $this to allow chaining bind and query.
     *
     * @param array<int,mixed>|array<string,mixed> $params
     */
    public function bind(array $params): Statement
    {
        $ffi = libsqlFFI();
        $unsafes = [];
        foreach ($params as $key => $value) {
            if (is_null($value)) {
                $value = $ffi->libsql_null();
            } elseif (is_int($value)) {
                $value = $ffi->libsql_integer($value);
            } elseif (is_double($value)) {
                $value = $ffi->libsql_real($value);
            } elseif (is_string($value)) {
                $unsafes[] = $text = string_::persistentZero($value);
                $value = $ffi->libsql_text($text, \strlen($value) + 1);
            } elseif ($value instanceof Blob) {
                $len = 0;
                $blob = null;
                if ($value->blob) {
                    $len = \strlen($value->blob) + 1;
                    $unsafes[] = $blob = uint8_t_ptr::persistentZero($value->blob);
                }
                $value = $ffi->libsql_blob($blob, $len);
            } else {
                throw new \InvalidArgumentException();
            }
            $bind = match (gettype($key)) {
                'string' => $ffi->libsql_statement_bind_named($this->inner, $key, $value),
                'integer' => $ffi->libsql_statement_bind_value($this->inner, $value),
            };
            try {
                errorIf($bind->err);
            } finally {
                freeUnsafe($unsafes);
            }
        }

        return $this;
    }
}
