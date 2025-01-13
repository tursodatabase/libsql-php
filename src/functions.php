<?php

declare(strict_types=1);

namespace Libsql;

use Exception;
use FFI;
use FFI\CData;

if (!extension_loaded('ffi')) {
    die('FFI extension is not loaded');
}

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
                ["Darwin", "arm64"] => '/../lib/aarch64-apple-darwin/liblibsql.dylib',
                ["Darwin", "x86_64"] => '/../lib/x86_64-apple-darwin/liblibsql.dylib',
                ["Linux", "x86_64"] => '/../lib/x86_64-unknown-linux-gnu/liblibsql.so',
                ["Linux", "arm64"] => '/../lib/aarch64-unknown-linux-gnu/liblibsql.so',
                ["Linux", "aarch64"] => '/../lib/aarch64-unknown-linux-gnu/liblibsql.so',
                ["Windows NT", "AMD64"] => '/../lib/x86_64-pc-windows-gnu/libsql.dll',
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

    throw new Exception("Only LIBSQL_TYPE_TEXT and LIBSQL_TYPE_BLOB can be converted into string.");
}
