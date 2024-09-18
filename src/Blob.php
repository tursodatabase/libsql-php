<?php

declare(strict_types=1);

namespace Libsql;

/** @internal */
class Blob
{
    public function __construct(public ?string $blob)
    {
    }
}
