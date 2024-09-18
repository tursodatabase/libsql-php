<?php

declare(strict_types=1);

namespace Libsql;

use FFI\CData;

class Row
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
        getFFI()->libsql_row_deinit($this->inner);
    }

    /**
     * Transform a row into a array of values.
     *
     * @return array<string,string|int|float|null>
     */
    public function toArray(): array
    {
        $result = [];

        for ($i = 0; $i < $this->length(); $i++) {
            $result[$this->name($i)] = $this->get($i);
        }

        return $result;
    }

    /**
     * Get amount of columns in this row.
     *
     * @param int $index
     *
     * @return ?string
     */
    public function length(): int
    {
        return getFFI()->libsql_row_length($this->inner);
    }

    /**
     * Get name of the column at the given index. If the index is out of
     * bounds, `null` will be returned.
     *
     * @param int $index
     *
     * @return ?string
     */
    public function name(int $index): ?string
    {
        $ffi = getFFI();
        $nameSlice = $ffi->libsql_row_name($this->inner, $index);

        if ($ffi::isNull($nameSlice->ptr)) {
            return null;
        }

        $name = $ffi::string($nameSlice->ptr, $nameSlice->len - 1);
        $ffi->libsql_slice_deinit($nameSlice);

        return $name;
    }

    /**
     * Get value from row at the given index.
     *
     * @param int $index
     *
     * @return string|int|float|null
     */
    public function get(int $index): string|int|float|null
    {
        $ffi = getFFI();
        $result = $ffi->libsql_row_value($this->inner, $index);
        errIf($result->err);

        return match ($result->ok->type) {
            $ffi->LIBSQL_TYPE_INTEGER => $result->ok->value->integer,
            $ffi->LIBSQL_TYPE_REAL => $result->ok->value->real,
            $ffi->LIBSQL_TYPE_TEXT => valueToString($result->ok),
            $ffi->LIBSQL_TYPE_BLOB => valueToString($result->ok),
            $ffi->LIBSQL_TYPE_NULL => null,
        };
    }

}
