<?php

namespace Libsql;

if (!extension_loaded('ffi')) {
    die('FFI extension is not loaded');
}

use FFI;
use Exception as Exception;

/** @internal */
function errIf(?FFI\CData $err, FFI $ffi)
{
    if ($err != null) {
        $message = $ffi->libsql_error_message($err);
        $ffi->libsql_error_deinit($err);
        throw new Exception($message);
    }
}

/** @internal */
function sliceIntoString(FFI\CData $value, FFI $ffi): string
{
    switch ($value->type) {
        case $ffi->LIBSQL_TYPE_TEXT:
            $text = FFI::string($value->value->text->ptr, $value->value->text->len - 1);
            $ffi->libsql_slice_deinit($value->value->text);
            return $text;
        case $ffi->LIBSQL_TYPE_BLOB:
            $blob = FFI::string($value->value->blob->ptr, $value->value->blob->len);
            $ffi->libsql_slice_deinit($value->value->blob);
            return $blob;
    }
}

/** @internal */
class CharStar
{
    public FFI\CData $ptr;
    public int $len;

    /** Allocate a char pointer from the contents of a string. */
    public function __construct(?string $str, FFI $ffi)
    {
        $cStr = $ffi->new("char *");
        $cLen = 0;

        if ($str) {
            $cLen = strlen($str) + 1;
            $cStr = $ffi->new(FFI::arrayType($ffi->type("char"), [$cLen]), owned: false);
            FFI::memcpy($cStr, $str, strlen($str));
        }

        $this->ptr = $cStr;
        $this->len = $cLen;
    }

    /** Deallocate memory. */
    public function destroy(): void
    {
        if ($this->ptr != null) {
            FFI::free($this->ptr);
        }
    }
}

class Statement
{
    /** @internal */
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    /**
     * @return void
     */
    public function __destruct()
    {
        $this->ffi->libsql_statement_deinit($this->inner);
    }

    /**
     * Execute statement.
     *
     * @return void
     */
    public function execute(): int
    {
        $exec = $this->ffi->libsql_statement_execute($this->inner);
        errIf($exec->err, $this->ffi);

        return $exec->rows_changed;
    }

    /**
     * Query statement.
     *
     * @return Rows
     */
    public function query(): Rows
    {
        $rows = $this->ffi->libsql_statement_query($this->inner);
        errIf($rows->err, $this->ffi);

        return new Rows($rows, $this->ffi);
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
        foreach ($params as $key => $value) {
            switch (gettype($key)) {
                case 'integer':
                    switch (gettype($value)) {
                        case 'integer':
                            $value = $this->ffi->libsql_integer($value);
                            $bind = $this->ffi->libsql_statement_bind_value($this->inner, $value);
                            errIf($bind->err, $this->ffi);
                            break;
                        case 'double':
                            $value = $this->ffi->libsql_real($value);
                            $bind = $this->ffi->libsql_statement_bind_value($this->inner, $value);
                            errIf($bind->err, $this->ffi);
                            break;
                        case 'string':
                            $cValue = new CharStar($value, $this->ffi);
                            $value = $this->ffi->libsql_text($cValue->ptr, $cValue->len);
                            $bind = $this->ffi->libsql_statement_bind_value($this->inner, $value);
                            try {
                                errIf($bind->err, $this->ffi);
                            } finally {
                                $cValue->destroy();
                            }
                            break;
                    }
                    break;
                case 'string':
                    switch (gettype($value)) {
                        case 'integer':
                            $value = $this->ffi->libsql_integer($value);
                            $bind = $this->ffi->libsql_statement_bind_named($this->inner, $key, $value);
                            errIf($bind->err, $this->ffi);
                            break;
                        case 'double':
                            $value = $this->ffi->libsql_real($value);
                            $bind = $this->ffi->libsql_statement_bind_named($this->inner, $key, $value);
                            errIf($bind->err, $this->ffi);
                            break;
                        case 'string':
                            $cValue = new CharStar($value, $this->ffi);
                            $value = $this->ffi->libsql_text($cValue->ptr, $cValue->len);
                            $bind = $this->ffi->libsql_statement_bind_named($this->inner, $key, $value);
                            try {
                                errIf($bind->err, $this->ffi);
                            } finally {
                                $cValue->destroy();
                            }
                            break;
                    }
                    break;
            }
        }

        return $this;
    }
}

class Row
{
    /** @internal */
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    /**
     * @return void
     */
    public function __destruct()
    {
        $this->ffi->libsql_row_deinit($this->inner);
    }

    /**
     * Transform a row into a array of values.
     *
     * @return array<<missing>,string|int|float|null>
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
        return $this->ffi->libsql_row_length($this->inner);
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
        $nameSlice = $this->ffi->libsql_row_name($this->inner, $index);

        if (FFI::isNull($nameSlice->ptr)) {
            return null;
        }

        $name = FFI::string($nameSlice->ptr, $nameSlice->len - 1);
        $this->ffi->libsql_slice_deinit($nameSlice);

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
        $value = $this->ffi->libsql_row_value($this->inner, $index);
        errIf($value->err, $this->ffi);

        return match ($value->ok->type) {
            $this->ffi->LIBSQL_TYPE_INTEGER => $value->ok->value->integer,
            $this->ffi->LIBSQL_TYPE_REAL => $value->ok->value->real,
            $this->ffi->LIBSQL_TYPE_TEXT => sliceIntoString($value->ok, $this->ffi),
            $this->ffi->LIBSQL_TYPE_BLOB => sliceIntoString($value->ok, $this->ffi),
            $this->ffi->LIBSQL_TYPE_NULL => null,
        };
    }

}

class Rows
{
    /** @internal */
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    /**
     * @return void
     */
    public function __destruct()
    {
        $this->ffi->libsql_rows_deinit($this->inner);
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
        $row = $this->ffi->libsql_rows_next($this->inner);
        errIf($row->err, $this->ffi);

        if ($this->ffi->libsql_row_empty($row)) {
            return null;
        }

        return new Row($row, $this->ffi);
    }
}

class Transaction
{
    /** @internal */
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    /**
     * Prepare statement with the given query in a transaction.
     *
     * @param string $sql
     *
     * @return Statement
     */
    public function prepare(string $sql): Statement
    {
        $stmt = $this->ffi->libsql_transaction_prepare($this->inner, $sql);
        errIf($stmt->err, $this->ffi);

        return new Statement($stmt, $this->ffi);
    }

    /**
     * Query with parameters in a transaction.
     *
     * @param string $sql
     * @param array<int,mixed>|array<string,mixed> $params
     *
     * @return Rows
     */
    public function query(string $sql, array $params = []): Rows
    {
        return $this->prepare($sql)->bind($params)->query();
    }

    /**
     * Execute with parameters in a transaction.
     *
     * @param string $sql
     * @param array<int,mixed>|array<string,mixed> $params
     *
     * @return int Rows changed
     */
    public function execute(string $sql, array $params = []): int
    {
        return $this->prepare($sql)->bind($params)->execute();
    }

    /**
     * Commit a transaction.
     *
     * @return void
     */
    public function commit(): void
    {
        $value = $this->ffi->libsql_transaction_commit($this->inner);
        errIf($value->err, $this->ffi);
    }

    /**
     * Rollback a transaction.
     *
     * @return void
     */
    public function rollback(): void
    {
        $value = $this->ffi->libsql_transaction_rollback($this->inner);
        errIf($value->err, $this->ffi);
    }

}

class Connection
{
    /** @internal */
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    /**
     * @return void
     */
    public function __destruct()
    {
        $this->ffi->libsql_connection_deinit($this->inner);
    }

    /**
     * Prepare statement with the given query.
     *
     * @param string $sql
     *
     * @return Statement
     */
    public function prepare(string $sql): Statement
    {
        $stmt = $this->ffi->libsql_connection_prepare($this->inner, $sql);
        errIf($stmt->err, $this->ffi);

        return new Statement($stmt, $this->ffi);
    }

    /**
     * Begin a transaction.
     *
     * @return Transaction
     */
    public function transaction(): Transaction
    {
        $tx = $this->ffi->libsql_connection_transaction($this->inner);
        errIf($tx->err, $this->ffi);

        return new Transaction($tx, $this->ffi);
    }

    /**
     * Query with parameters.
     *
     * @param string $sql
     * @param array<int,mixed>|array<string,mixed> $params
     *
     * @return Rows
     */
    public function query(string $sql, array $params = []): Rows
    {
        return $this->prepare($sql)->bind($params)->query();
    }

    /**
     * Execute with parameters.
     *
     * @param string $sql
     * @param array<int,mixed>|array<string,mixed> $params
     *
     * @return int Rows changed
     */
    public function execute(string $sql, array $params = []): int
    {
        return $this->prepare($sql)->bind($params)->execute();
    }
}

class Database
{
    /** @internal */
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    /**
     * @return void
     */
    public function __destruct()
    {
        $this->ffi->libsql_database_deinit($this->inner);
    }

    /**
     * Create connection to libSQL database.
     *
     * @return Connection
     */
    public function connect(): Connection
    {
        $conn = $this->ffi->libsql_database_connect($this->inner);
        errIf($conn->err, $this->ffi);

        return new Connection($conn, $this->ffi);
    }

    /**
     * Sync frames with the primary.
     *
     * @return void
     */
    public function sync(): void
    {
        $sync = $this->ffi->libsql_sync($this->inner);
        errIf($sync->err, $this->ffi);
    }
}

class Libsql
{
    public FFI $ffi;

    public function __construct()
    {
        $os = php_uname('s');
        $arch = php_uname('m');

        $this->ffi = FFI::cdef(
            file_get_contents(__DIR__ . '/../lib/libsql.h'),
            __DIR__ . match ([$os, $arch]) {
                ["Darwin", "arm64"] => '/../lib/universal2-apple-darwin/liblibsql.dylib',
                ["Darwin", "x86_64"] => '/../lib/universal2-apple-darwin/liblibsql.dylib',
                ["Linux", "x86_64"] => '/../lib/x86_64-unknown-linux-gnu/liblibsql.so',
                default => die("Unsupported OS $os $arch"),
            },
        );
    }

    /**
     * Open a embedded replica database.
     *
     * @param string $path Path to the database file
     * @param string $url Url of the primary
     * @param string $authToken Auth token
     * @param ?string $encryptionKey Key used to de/encrypt the database (default: null)
     * @param int $syncInterval Interval used to sync frames periodicaly with primary (default: 0, i.e.: only sync manually)
     * @param bool $readYourWrites Make writes visible within a sync period (default: true)
     * @param bool $webpki Use Webpki (default: false)
     *
     * @return Database
     */
    public function openEmbeddedReplica(
        ?string $path = null,
        ?string $url = null,
        #[\SensitiveParameter]
        ?string $authToken = null,
        #[\SensitiveParameter]
        ?string $encryptionKey = null,
        int $syncInterval = 0,
        bool $readYourWrites = true,
        bool $webpki = false,
    ): Database {
        $cPath = new CharStar($path, $this->ffi);
        $cUrl = new CharStar($url, $this->ffi);
        $cAuthToken = new CharStar($authToken, $this->ffi);
        $cEncryptionKey = new CharStar($encryptionKey, $this->ffi);

        $desc = $this->ffi->new('libsql_database_desc_t');
        $desc->path = $cPath->ptr;
        $desc->url = $cUrl->ptr;
        $desc->auth_token = $cAuthToken->ptr;
        $desc->encryption_key = $encryptionKey->ptr;
        $desc->webpki = $webpki;
        $desc->not_read_your_writes = !$readYourWrites;

        $db = $this->ffi->libsql_database_init($desc);

        try {
            errIf($db->err, $this->ffi);
        } finally {
            $cPath->destroy();
            $cUrl->destroy();
            $cAuthToken->destroy();
            $cEncryptionKey->destroy();
        }

        return new Database($db, $this->ffi);
    }

    /**
     * Open a remote database.
     *
     * @param string $url Url to the primary
     * @param string $authToken Auth token provided by Turso
     * @param bool $webpki Use Webpki (default: false)
     *
     * @return Database
     */
    public function openRemote(
        ?string $url = null,
        #[\SensitiveParameter]
        ?string $authToken = null,
        #[\SensitiveParameter]
        bool $webpki = false,
    ): Database {
        $cUrl = new CharStar($url, $this->ffi);
        $cAuthToken = new CharStar($authToken, $this->ffi);

        $desc = $this->ffi->new('libsql_database_desc_t');
        $desc->url = $cUrl->ptr;
        $desc->auth_token = $cAuthToken->ptr;
        $desc->webpki = $webpki;

        $db = $this->ffi->libsql_database_init($desc);

        try {
            errIf($db->err, $this->ffi);
        } finally {
            $cUrl->destroy();
            $cAuthToken->destroy();
        }

        return new Database($db, $this->ffi);
    }

    /**
     * Open a local database.
     *
     * @param string $path Path to the database file
     * @param ?string $encryptionKey Key used to de/encrypt the database (default: null)
     *
     * @return Database
     */
    public function openLocal(
        string $path,
        ?string $encryptionKey = null,
    ): Database {
        $cPath = new CharStar($path, $this->ffi);
        $cEncryptionKey = new CharStar($encryptionKey, $this->ffi);

        $desc = $this->ffi->new('libsql_database_desc_t');
        $desc->path = $cPath->ptr;
        $desc->encryption_key = $cEncryptionKey->ptr;

        $db = $this->ffi->libsql_database_init($desc);

        try {
            errIf($db->err, $this->ffi);
        } finally {
            $cPath->destroy();
            $cEncryptionKey->destroy();
        }

        return new Database($db, $this->ffi);
    }
}
