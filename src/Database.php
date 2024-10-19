<?php

declare(strict_types=1);

namespace Libsql;

if (!extension_loaded('ffi')) {
    die('FFI extension is not loaded');
}

use FFI;
use FFI\CData;

/** @internal */
function getFFI(): ?FFI
{
    /** @var ?FFI */
    static $ffi = null;

    if ($ffi === null) {
        $os = php_uname('s');
        $arch = php_uname('m');

        $ffi = FFI::cdef(
            file_get_contents(__DIR__ . '/../lib/libsql.h'),
            __DIR__ . match ([$os, $arch]) {
                ["Darwin", "arm64"] => '/../lib/universal2-apple-darwin/liblibsql.dylib',
                ["Darwin", "x86_64"] => '/../lib/universal2-apple-darwin/liblibsql.dylib',
                ["Linux", "x86_64"] => '/../lib/x86_64-unknown-linux-gnu/liblibsql.so',
                ["Linux", "arm64"] => '/../lib/aarch64-unknown-linux-gnu/liblibsql.so',
                default => die("Unsupported OS $os $arch"),
            },
        );
    }

    return $ffi;
}

{
    $ffi = getFFI();

    $version = new CharBox('libsql-php');

    $config = $ffi->new('libsql_config_t');
    $config->version = $version->ptr;

    $ffi->libsql_setup($config);

    $version->destroy();
}

/** @internal */
function errIf(?CData $err)
{
    $ffi = getFFI();

    if ($err != null) {
        $message = $ffi->libsql_error_message($err);
        $ffi->libsql_error_deinit($err);
        throw new LibsqlException($message);
    }
}

/** @internal */
function valueToString(CData $value): string
{
    $ffi = getFFI();

    switch ($value->type) {
        case $ffi->LIBSQL_TYPE_TEXT:
            $text = FFI::string(
                $value->value->text->ptr,
                $value->value->text->len - 1,
            );
            $ffi->libsql_slice_deinit($value->value->text);
            return $text;
        case $ffi->LIBSQL_TYPE_BLOB:
            $blob = FFI::string(
                $value->value->blob->ptr,
                $value->value->blob->len,
            );
            $ffi->libsql_slice_deinit($value->value->blob);
            return $blob;
    }
}

class Database
{
    protected CData $inner;

    /**
     * Open a database.
     *
     * @param ?string $path Path to the database file (default: null)
     * @param ?string $url Url of the primary (default: null)
     * @param ?string $authToken Auth token (default: null)
     * @param ?string $encryptionKey Key used to de/encrypt the database (default: null)
     * @param int $syncInterval Interval used to sync frames periodicaly with primary (default: 0, sync manually)
     * @param bool $readYourWrites Make writes visible within a sync period (default: true)
     * @param bool $webpki Use Webpki (default: false)
     */
    public function __construct(
        string $path = null,
        string $url = null,
        #[\SensitiveParameter]
        string $authToken = null,
        #[\SensitiveParameter]
        ?string $encryptionKey = null,
        int $syncInterval = 0,
        bool $readYourWrites = true,
        bool $webpki = false,
    ) {
        $ffi = getFFI();

        $boxed = [
            'path' => new CharBox($path),
            'url' => new CharBox($url),
            'authToken' => new CharBox($authToken),
            'encryptionKey' => new CharBox($encryptionKey),
        ];

        $desc = $ffi->new('libsql_database_desc_t');
        $desc->path = $boxed['path']->ptr;
        $desc->url = $boxed['url']->ptr;
        $desc->auth_token = $boxed['authToken']->ptr;
        $desc->encryption_key = $boxed['encryptionKey']->ptr;
        $desc->webpki = $webpki;
        $desc->disable_read_your_writes = !$readYourWrites;

        $db = $ffi->libsql_database_init($desc);

        try {
            errIf($db->err);
        } finally {
            foreach ($boxed as $box) {
                $box->destroy();
            }
        }

        $this->inner = $db;
    }

    /**
     * @internal
     *
     * @return void
     */
    public function __destruct()
    {
        getFFI()->libsql_database_deinit($this->inner);
    }

    /**
     * Create connection to libSQL database.
     *
     * @return Connection
     */
    public function connect(): Connection
    {
        $conn = getFFI()->libsql_database_connect($this->inner);
        errIf($conn->err);

        return new Connection($conn);
    }

    /**
     * Sync frames with the primary.
     *
     * @return void
     */
    public function sync(): void
    {
        $sync = getFFI()->libsql_database_sync($this->inner);
        errIf($sync->err);
    }
}
