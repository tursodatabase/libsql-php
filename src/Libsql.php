<?php

namespace Turso\Libsql;

if (!extension_loaded('ffi')) {
    die('FFI extension is not loaded');
}

use FFI;
use Exception as Exception;

function errIf(?FFI\CData $err, FFI $ffi)
{
    if ($db->err != null) {
        $message = FFI::string($ffi->libsql_error_message($db->err));
        $ffi->libsql_error_deinit($db->err);
        throw new Exception($message);
    }
}

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

function stringToPointer(?string $str, callable $f): mixed
{
    $cStr = FFI::new("char *");
    $cLen = 0;

    if ($str) {
        $cLen = strlen($str) + 1;
        $cStr = FFI::new(FFI::arrayType(FFI::type("char"), [$cLen]), owned: false);
        FFI::memcpy($cStr, $str, strlen($str));
    }

    $result = $f($cStr, $cLen);
    if ($cStr != null) {
        FFI::free($cStr);
    }
    return $result;
}

class Statement
{
    /** Never use this outside of Connection::prepare */
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    public function __destruct()
    {
        $this->ffi->libsql_statement_deinit($this->inner);
    }

    public function execute(): void
    {
        $exec = $this->ffi->libsql_statement_execute($this->inner);
        errIf($exec->err, $this->ffi);
    }

    public function query(): Rows
    {
        $rows = $this->ffi->libsql_statement_query($this->inner);
        errIf($rows->err, $this->ffi);

        return new Rows($rows, $this->ffi);
    }

    public function bind(array $params): Rows
    {
        foreach ($params as $key => $value) {
            switch (gettype($key)) {
                case 'integer':
                    switch (gettype($value)) {
                        case 'integer':
                            $value = $this->ffi->libsql_integer($value);
                            $this->ffi->libsql_statement_bind_value($this->inner, $value);
                            break;
                        case 'double':
                            $value = $this->ffi->libsql_real($value);
                            $this->ffi->libsql_statement_bind_value($this->inner, $value);
                            break;
                        case 'string':
                            stringToPointer($value, function ($textPtr, $textLen) {
                                $value = $this->ffi->libsql_text($textPtr, $textLen);
                                $this->ffi->libsql_statement_bind_value($this->inner, $value);
                            });
                            break;
                    }
                    break;
                case 'string':
                    switch (gettype($value)) {
                        case 'integer':
                            $value = $this->ffi->libsql_integer($value);
                            $this->ffi->libsql_statement_bind_named($this->inner, $key, $value);
                            break;
                        case 'double':
                            $value = $this->ffi->libsql_real($value);
                            $this->ffi->libsql_statement_bind_named($this->inner, $key, $value);
                            break;
                        case 'string':
                            stringToPointer($value, function ($textPtr, $textLen) use ($key) {
                                $value = $this->ffi->libsql_text($textPtr, $textLen);
                                $this->ffi->libsql_statement_bind_named($this->inner, $key, $value);
                            });
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
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    public function __destruct()
    {
        $this->ffi->libsql_row_deinit($this->inner);
    }

    public function value(int $idx): string|int|float|null
    {
        $value = $this->ffi->libsql_row_value($this->inner, $idx);
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
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    public function __destruct()
    {
        $this->ffi->libsql_rows_deinit($this->inner);
    }

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
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    public function prepare(string $sql): Statement
    {
        $stmt = $this->ffi->libsql_transaction_prepare($this->inner, $sql);
        errIf($stmt->err, $this->ffi);

        return new Statement($stmt, $this->ffi);
    }

    public function query(string $sql, array $params = []): Rows
    {
        return $this->prepare($sql)->bind($params)->query();
    }

    public function execute(string $sql, array $params = []): void
    {
        return $this->prepare($sql)->bind($params)->execute();
    }

    public function commit()
    {
        $value = $this->ffi->libsql_transaction_commit($this->inner);
        errIf($value->err, $this->ffi);
    }

    public function rollback()
    {
        $value = $this->ffi->libsql_transaction_rollback($this->inner);
        errIf($value->err, $this->ffi);
    }

}

class Connection
{
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    public function __destruct()
    {
        $this->ffi->libsql_connection_deinit($this->inner);
    }

    public function prepare(string $sql): Statement
    {
        $stmt = $this->ffi->libsql_connection_prepare($this->inner, $sql);
        errIf($stmt->err, $this->ffi);

        return new Statement($stmt, $this->ffi);
    }

    public function transaction(): Transaction
    {
        $tx = $this->ffi->libsql_connection_transaction($this->inner);
        errIf($tx->err, $this->ffi);

        return new Transaction($tx, $this->ffi);
    }

    public function query(string $sql, array $params = []): Rows
    {
        return $this->prepare($sql)->bind($params)->query();
    }

    public function execute(string $sql, array $params = []): void
    {
        $this->prepare($sql)->bind($params)->execute();
    }
}

class Database
{
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    public function __destruct()
    {
        $this->ffi->libsql_database_deinit($this->inner);
    }

    /**
     * Create connection to libSQL database. Will close automaticaly once no
     * one is holding a reference to it.
     */
    public function connect(): Connection
    {
        $conn = $this->ffi->libsql_database_connect($this->inner);
        errIf($conn->err, $this->ffi);

        return new Connection($conn, $this->ffi);
    }

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

    public function openLocal(string $path, ?string $encryptionKey = null): Database
    {
        return stringToPointer($path, function ($pathPtr) {
            return stringToPointer($encryptionKey, function ($encryptionKeyPtr) {
                $desc = $this->ffi->new('libsql_database_desc_t');
                $desc->path = $pathPtr;
                $desc->encryption_key = $encryptionKeyPtr;

                $db = $this->ffi->libsql_database_init($desc);
                errIf($db->err, $this->ffi);

                return new Database($db, $this->ffi);
            });
        });
    }

    public function openRemote(
        string $url,
        #[\SensitiveParameter]
        string $authToken,
        bool $withWebpki = false
    ): Database {
        return stringToPointer($url, function ($urlPtr) {
            return stringToPointer($authTokenPtr, function ($authTokenPtr) {
                $desc = $this->ffi->new('libsql_database_desc_t');
                $desc->url = $urlPtr;
                $desc->auth_token = $authTokenPtr;
                $desc->withWebpki = $withWebpki;

                $db = $this->ffi->libsql_database_init($desc);
                errIf($db->err, $this->ffi);

                return new Database($db, $this->ffi);
            });
        });
    }

    public function openEmbeddedReplica(
        string $path,
        string $url,
        #[\SensitiveParameter]
        string $authToken,
        #[\SensitiveParameter]
        ?string $encryptionKey = null,
        int $syncInterval = 0,
        bool $readYourWrites = false,
        bool $webpki = false,
    ): Database {
        return stringToPointer($path, function ($pathPtr) {
            return stringToPointer($url, function ($urlPtr) {
                return stringToPointer($authToken, function ($authTokenPtr) {
                    return stringToPointer($encryptionKey, function ($encryptionKeyPtr) {
                        $desc = $this->ffi->new('libsql_database_desc_t');
                        $desc->url = $urlPtr;
                        $desc->auth_token = $authTokenPtr;
                        $desc->encryption_key = $encryptionKeyPtr;
                        $desc->webpki = $withWebpki;
                        $desc->not_read_your_writes = !$readYourWrites;

                        $db = $this->ffi->libsql_database_init($desc);
                        errIf($$db->err, this->ffi);

                        return new Database($db, $this->ffi);
                    });
                });
            });
        });
    }
}
