<?php

declare(strict_types=1);

namespace Libsql;

use ffi\libsql_rows_t;

/**
 * @implements \IteratorAggregate<int,Row>
 */
class Rows implements \IteratorAggregate, \JsonSerializable, \Stringable
{
    /** @internal */
    public function __construct(protected libsql_rows_t $inner)
    {
    }

    /**
     * @internal
     *
     * @return void
     */
    public function __destruct()
    {
        libsqlFFI()->libsql_rows_deinit($this->inner);
    }

    /**
     * Transform rows into a array of arrays.
     *
     * @return array<array<string, string|int|float|null>>
     */
    public function fetchArray(): array
    {
        $result = [];

        foreach ($this as $i => $row) {
            $result[$i] = $row->toArray();
        }

        return $result;
    }

    /**
     * Iterator over rows.
     *
     * @return \Traversable<Row>
     */
    #[\Override]
    public function getIterator(): \Traversable
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

    #[\Override]
    public function jsonSerialize(): mixed
    {
        return $this->fetchArray();
    }

    #[\Override]
    public function __toString(): string
    {
        return json_encode($this);
    }

    /**
     * Get the next row.
     */
    public function next(): ?Row
    {
        $ffi = libsqlFFI();
        $row = $ffi->libsql_rows_next($this->inner);
        errorIf($row->err);

        if ($ffi->libsql_row_empty($row)) {
            return null;
        }

        return new Row($row);
    }
}
