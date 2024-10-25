<?php

namespace Libsql;

use ffi\libsql_slice_t;
use ffi\libsqlFFI;
use ffi\string_;
use ffi\struct_libsql_error_t_ptr;

if (!extension_loaded('ffi')) {
    exit('FFI extension is not loaded');
}

/**
 * @internal
 */
function findDynamicLibsql(): string
{
    $os = php_uname('s');
    $arch = php_uname('m');

    return __DIR__.match ([$os, $arch]) {
        ['Darwin', 'arm64'] => '/../lib/universal2-apple-darwin/liblibsql.dylib',
        ['Darwin', 'x86_64'] => '/../lib/universal2-apple-darwin/liblibsql.dylib',
        ['Linux', 'x86_64'] => '/../lib/x86_64-unknown-linux-gnu/liblibsql.so',
        ['Linux', 'arm64'] => '/../lib/aarch64-unknown-linux-gnu/liblibsql.so',
        default => exit("Unsupported OS $os $arch"),
    };
}

/**
 * @internal
 */
function libsqlFFI(): libsqlFFI
{
    static $instance = null;
    if (null === $instance) {
        $instance = new libsqlFFI(findDynamicLibsql());
    }

    return $instance;
}

/**
 * @internal
 *
 * @template T
 *
 * @param class-string<T> $type
 *
 * @return T
 */
function newCType(string $type)
{
    $cdata = libsqlFFI()->getFFI()->new($type::getType());

    return new $type($cdata);
}

/**
 * @internal
 */
function sliceToString(libsql_slice_t $value): string
{
    $ptr = $value->ptr->getData();

    return libsqlFFI()->getFFI()::string($ptr, $value->len - 1);
}

/**
 * @internal
 */
function errorIf(?struct_libsql_error_t_ptr $err): void
{
    $ffi = libsqlFFI();
    if (!$err) {
        return;
    }
    $message = $ffi->libsql_error_message($err)->toString();
    $ffi->libsql_error_deinit($err);
    throw new LibsqlException($message);
}

/**
 * @internal
 *
 * @param string_[] $unsafes
 */
function freeUnsafe(array $unsafes): void
{
    $ffi = libsqlFFI();
    foreach ($unsafes as $unsafe) {
        $ptr = $unsafe->getData();
        $ffi->getFFI()::free($ptr);
    }
}
