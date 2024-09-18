<?php

declare(strict_types=1);

namespace Libsql;

use FFI\CData;

class Rows
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
        getFFI()->libsql_rows_deinit($this->inner);
    }

    /**
     * Transform rows into a array of arrays.
     *
     * @return array<array<string, string|int|float|null>>
     */
    public function fetchArray(): array
    {
        $result = [];
        $i = 0;

        foreach ($this->iterator() as $row) {
            $result[$i] = $row->toArray();
            $i++;
        }

        return $result;
    }

    /**
     * Iterator over rows.
     *
     * @return Generator<Row>
     */
    public function iterator(): iterable
    {
        while (true) {
            $row = $this->next();

            if ($row) {
                yield $row;
            } else {
                return;
            }
        }
    }

    /**
     * Get the next row.
     *
     * @return ?Row
     */
    public function next(): ?Row
    {
        $ffi = getFFI();
        $row = $ffi->libsql_rows_next($this->inner);
        errIf($row->err);

        if ($ffi->libsql_row_empty($row)) {
            return null;
        }

        return new Row($row);
    }
}
