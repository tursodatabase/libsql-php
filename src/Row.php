<?php

declare(strict_types=1);

namespace Libsql;

use ffi\libsql;
use ffi\libsql_row_t;

class Row implements \JsonSerializable, \Countable, \Stringable
{
    /** @var array<string, int> */
    private array $columnNames = [];

    /** @internal */
    public function __construct(protected libsql_row_t $inner)
    {
        for ($i = 0; $i < count($this); ++$i) {
            $this->columnNames[$this->name($i)] = $i;
        }
    }

    /**
     * @internal
     *
     * @return void
     */
    public function __destruct()
    {
        libsqlFFI()->libsql_row_deinit($this->inner);
    }

    /**
     * Transform a row into a array of values.
     *
     * @return array<string,string|int|float|null>
     */
    public function toArray(): array
    {
        $result = [];

        for ($i = 0; $i < $this->count(); ++$i) {
            $result[$this->name($i)] = $this->get($i);
        }

        return $result;
    }

    #[\Override]
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }

    /**
     * Get amount of columns in this row.
     */
    #[\Override]
    public function count(): int
    {
        return libsqlFFI()->libsql_row_length($this->inner);
    }

    #[\Override]
    public function __toString(): string
    {
        return json_encode($this);
    }

    /**
     * Get name of the column at the given index. If the index is out of
     * bounds, `null` will be returned.
     */
    public function name(int $index): ?string
    {
        $ffi = libsqlFFI();
        $nameSlice = $ffi->libsql_row_name($this->inner, $index);
        if (null === $nameSlice) {
            return null;
        }
        $name = sliceToString($nameSlice);
        $ffi->libsql_slice_deinit($nameSlice);

        return $name;
    }

    /**
     * Get value from row at the given index.
     */
    public function get(int $index): string|int|float|Blob|null
    {
        $ffi = libsqlFFI();
        $result = $ffi->libsql_row_value($this->inner, $index);
        errorIf($result->err);

        return match ($result->ok->type) {
            libsql::LIBSQL_TYPE_INTEGER => $result->ok->value->integer,
            libsql::LIBSQL_TYPE_REAL => $result->ok->value->real,
            libsql::LIBSQL_TYPE_TEXT => sliceToString($result->ok->value->text),
            libsql::LIBSQL_TYPE_BLOB => new Blob(sliceToString($result->ok->value->blob)),
            libsql::LIBSQL_TYPE_NULL => null,
            default => throw new \InvalidArgumentException(),
        };
    }

    public function __get(string $name): string|int|float|Blob|null
    {
        if (isset($this->columnNames[$name])) {
            return $this->get($this->columnNames[$name]);
        } else {
            throw new \Exception("Missing column: $name");
        }
    }
}
