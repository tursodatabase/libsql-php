<?php

namespace Turso\Libsql;

if (!extension_loaded('ffi')) {
    die('FFI extension is not loaded');
}

use FFI;
use \Exception as Exception;

function stringToUnmanagedPointer(string $str): FFI\CData
{
    $cStr = FFI::new(FFI::arrayType(FFI::type("char"), [strlen($str) + 1]), owned: false);
    FFI::memcpy($cStr, $str, strlen($str));
    return $cStr;
}

class Statement
{
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    function __destruct()
    {
        $this->ffi->libsql_free_stmt($this->inner);
    }

    public function execute(): void
    {
        $err = $this->ffi->new('const char *');
        if ($this->ffi->libsql_execute_stmt($this->inner, FFI::addr($err)) != 0) {
            $err_copy = FFI::string($err);
            $this->ffi->libsql_free_string($err);

            throw new Exception($err_copy);
        }
    }

    public function query(): Rows
    {
        $rows = $this->ffi->new('libsql_rows_t');
        $err = $this->ffi->new('const char *');
        if ($this->ffi->libsql_query_stmt($this->inner, FFI::addr($rows), FFI::addr($err)) != 0) {
            $err_copy = FFI::string($err);
            $this->ffi->libsql_free_string($err);

            throw new Exception($err_copy);
        }

        return new Rows($rows, $this->ffi);
    }

    public function bind(...$params)
    {
        $i = 1;

        foreach ($params as $param) {
            switch (gettype($param)) {
                case 'NULL':
                    $err = $this->ffi->new('const char *');
                    if ($this->ffi->libsql_bind_null($this->inner, $i, FFI::addr($err)) != 0) {
                        $err_copy = FFI::string($err);
                        $this->ffi->libsql_free_string($err);

                        throw new Exception($err_copy);
                    }
                    break;
                case 'string':
                    $err = $this->ffi->new('const char *');
                    if (
                        $this->ffi->libsql_bind_string(
                            $this->inner,
                            $i,
                            $param,
                            FFI::addr($err),
                        ) != 0
                    ) {
                        $err_copy = FFI::string($err);
                        $this->ffi->libsql_free_string($err);

                        throw new Exception($err_copy);
                    }
                    break;
                case 'double':
                    $err = $this->ffi->new('const char *');
                    if (
                        $this->ffi->libsql_bind_float(
                            $this->inner,
                            $i,
                            $param,
                            FFI::addr($err)
                        ) != 0
                    ) {
                        $err_copy = FFI::string($err);
                        $this->ffi->libsql_free_string($err);

                        throw new Exception($err_copy);
                    }
                    break;
                case 'integer':
                    $err = $this->ffi->new('const char *');
                    if (
                        $this->ffi->libsql_bind_int(
                            $this->inner,
                            $i,
                            $param,
                            FFI::addr($err),
                        ) != 0
                    ) {
                        $err_copy = FFI::string($err);
                        $this->ffi->libsql_free_string($err);

                        throw new Exception($err_copy);
                    }
                    break;
            }

            $i++;
        }
    }
}

class Row
{
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    function __destruct()
    {
        $this->ffi->libsql_free_row($this->inner);
    }

    public function get(int $idx): string|int|float|null
    {
        $type = $this->ffi->new('int32_t');
        $err = $this->ffi->new('const char *');

        if ($this->ffi->libsql_column_type($this->inner, $idx, ffi::addr($type), ffi::addr($err)) != 0) {
            $err_copy = ffi::string($err);
            $this->ffi->libsql_free_string($err);

            throw new Exception($err_copy);
        }

        return match ($type->cdata) {
            1 /* LIBSQL_INT   */ => $this->getInt($idx),
            2 /* LIBSQL_FLOAT */ => $this->getFloat($idx),
            3 /* LIBSQL_TEXT  */ => $this->getString($idx),
            4 /* LIBSQL_BLOB  */ => $this->getBlob($idx),
            5 /* LIBSQL_NULL  */ => null,
        };
    }

    public function getInt(int $idx): int
    {
        $integer = $this->ffi->new('int64_t');
        $err = $this->ffi->new('const char *');

        if ($this->ffi->libsql_get_int($this->inner, $idx, ffi::addr($integer), ffi::addr($err)) != 0) {
            $err_copy = ffi::string($err);
            $this->ffi->libsql_free_string($err);

            throw new Exception($err_copy);
        }

        return $integer->cdata;
    }

    public function getFloat(int $idx): float
    {
        $double = $this->ffi->new('double');
        $err = $this->ffi->new('const char *');

        if ($this->ffi->libsql_get_float($this->inner, $idx, FFI::addr($double), FFI::addr($err)) != 0) {
            $err_copy = FFI::string($err);
            $this->ffi->libsql_free_string($err);

            throw new Exception($err_copy);
        }

        return $double->cdata;
    }

    public function getString(int $idx): string
    {
        $str = $this->ffi->new('char *');
        $err = $this->ffi->new('const char *');

        if ($this->ffi->libsql_get_string($this->inner, $idx, FFI::addr($str), FFI::addr($err)) != 0) {
            $err_copy = FFI::string($err);
            $this->ffi->libsql_free_string($err);

            throw new Exception($err_copy);
        }

        $result =  FFI::string($str);
        $this->ffi->libsql_free_string($str);

        return $result;
    }

    public function getBlob(int $idx): string
    {
        $blob = $this->ffi->new('blob');
        $err = $this->ffi->new('const char *');

        if ($this->ffi->libsql_get_blob($this->inner, $idx, FFI::addr($blob), FFI::addr($err)) != 0) {
            $err_copy = FFI::string($err);
            $this->ffi->libsql_free_string($err);

            throw new Exception($err_copy);
        }

        $result =  FFI::string($blob->ptr, $blob->len);
        $this->ffi->libsql_free_blob($blob);

        return $result;
    }
}

class Rows
{
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    function __destruct()
    {
        $this->ffi->libsql_free_rows($this->inner);
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
        $row = $this->ffi->new('libsql_row_t');
        $err = $this->ffi->new('const char *');

        if ($this->ffi->libsql_next_row($this->inner, FFI::addr($row), FFI::addr($err)) != 0) {
            $err_copy = FFI::string($err);
            $this->ffi->libsql_free_string($err);

            throw new Exception($err_copy);
        }

        if (FFI::isNull($row)) {
            return null;
        }

        return new Row($row, $this->ffi);
    }
}

class Connection
{
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    function __destruct()
    {
        $this->ffi->libsql_disconnect($this->inner);
    }

    public function prepare(string $sql): Statement
    {
        $stmt = $this->ffi->new('libsql_stmt_t');
        $err = $this->ffi->new('const char *');
        if ($this->ffi->libsql_prepare($this->inner, $sql, FFI::addr($stmt), FFI::addr($err)) != 0) {
            $err_copy = FFI::string($err);
            $this->ffi->libsql_free_string($err);

            throw new Exception($err_copy);
        }

        return new Statement($stmt, $this->ffi);
    }

    public function query(string $sql): Rows
    {
        $rows = $this->ffi->new('libsql_rows_t');
        $err = $this->ffi->new('const char *');
        if ($this->ffi->libsql_query($this->inner, $sql, FFI::addr($rows), FFI::addr($err)) != 0) {
            $err_copy = FFI::string($err);
            $this->ffi->libsql_free_string($err);

            throw new Exception($err_copy);
        }

        return new Rows($rows, $this->ffi);
    }

    public function execute(string $sql)
    {
        $err = $this->ffi->new('const char *');

        if ($this->ffi->libsql_execute($this->inner, $sql, FFI::addr($err)) != 0) {
            $err_copy = FFI::string($err);
            $this->ffi->libsql_free_string($err);

            throw new Exception($err_copy);
        }

        return;
    }
}

class Database
{
    public function __construct(protected FFI\CData $inner, protected FFI $ffi)
    {
    }

    function __destruct()
    {
        $this->ffi->libsql_close($this->inner);
    }

    public function connect()
    {
        $conn = $this->ffi->new('libsql_connection_t');
        $err = $this->ffi->new('const char *');

        if ($this->ffi->libsql_connect($this->inner, FFI::addr($conn), FFI::addr($err)) != 0) {
            $err_copy = FFI::string($err);
            $this->ffi->libsql_free_string($err);

            throw new Exception($err_copy);
        }

        return new Connection($conn, $this->ffi);
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
                ["Linuz", "x86_64"] => '/../lib/x86_64-unknown-linux-gnu/liblibsql.so',
                default => die("Unsupported OS $os $arch"),
            },
        );
    }

    public function openLocal(string $path): Database
    {
        $db = $this->ffi->new('libsql_database_t');
        $err = $this->ffi->new('const char *');

        if ($this->ffi->libsql_open_ext($path, FFI::addr($db), FFI::addr($err)) != 0) {
            $err_copy = FFI::string($err);
            $this->ffi->libsql_free_string($err);

            throw new Exception($err_copy);
        }

        return new Database($db, $this->ffi);
    }

    public function openRemote(
        string $url,
        string $authToken,
        bool $withWebpki = false
    ): Database {
        $db = $this->ffi->new('libsql_database_t');

        if ($withWebpki) {
            $err = $this->ffi->new('const char *');
            if ($this->ffi->libsql_open_remote_with_webpki($url, $authToken, FFI::addr($db), FFI::addr($err)) != 0) {
                $err_copy = FFI::string($err);
                $this->ffi->libsql_free_string($err);

                throw new Exception($err_copy);
            }
        } else {
            $err = $this->ffi->new('const char *');
            if ($this->ffi->libsql_open_remote($url, $authToken, FFI::addr($db), FFI::addr($err)) != 0) {
                $err_copy = FFI::string($err);
                $this->ffi->libsql_free_string($err);

                throw new Exception($err_copy);
            }
        }

        return new Database($db, $this->ffi);
    }

    public function openEmbeddedReplica(
        string $path,
        string $url,
        #[\SensitiveParameter]
        string $authToken,
        #[\SensitiveParameter]
        ?string $encryptionKey = null,
        bool $readYourWrites = false,
        int $syncInterval = 0,
        bool $withWebpki = false,
    ): Database {
        $db = $this->ffi->new('libsql_database_t');
        $err = $this->ffi->new('const char *');

        $config = $this->ffi->new('libsql_config');

        $config->db_path = stringToUnmanagedPointer($path);
        $config->primary_url = stringToUnmanagedPointer($url);
        $config->auth_token = stringToUnmanagedPointer($authToken);

        if ($encryptionKey != null) {
            $config->encryption_key = stringToUnmanagedPointer($encryptionKey);
        }

        $config->with_webpki = $withWebpki ? 0 : 1;
        $config->read_your_writes = $readYourWrites ? 0 : 1;
        $config->sync_interval = $syncInterval;


        if ($this->ffi->libsql_open_sync_with_config($config, FFI::addr($db), FFI::addr($err)) != 0) {
            $err_copy = FFI::string($err);
            $this->ffi->libsql_free_string($err);

            throw new Exception($err_copy);
        }

        FFI::free($config->db_path);
        FFI::free($config->primary_url);
        FFI::free($config->auth_token);

        if ($encryptionKey) {
            FFI::free($config->encryption_key);
        }

        return new Database($db, $this->ffi);
    }
}
