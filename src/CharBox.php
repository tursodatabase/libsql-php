<?php

declare(strict_types=1);

namespace Libsql;

use FFI\CData;

/** @internal */
class CharBox
{
    public CData $ptr;
    public int $len;

    /** Allocate a char pointer from the contents of a string. */
    public function __construct(?string $str)
    {
        $ffi = getFFI();

        $cStr = $ffi->new("char *");
        $cLen = 0;

        if ($str) {
            $cLen = strlen($str) + 1;
            $cStr = $ffi->new($ffi::arrayType($ffi->type("char"), [$cLen]), owned: false);
            $ffi::memcpy($cStr, $str, strlen($str));
        }

        $this->ptr = $cStr;
        $this->len = $cLen;
    }

    /** Deallocate memory. */
    public function destroy(): void
    {
        if ($this->ptr != null) {
            getFFI()::free($this->ptr);
        }
    }
}
