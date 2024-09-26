<?php

declare(strict_types=1);

namespace Libsql;

use JsonSerializable;

/** @internal */
class Blob implements JsonSerializable
{
    public function __construct(public ?string $blob)
    {
    }

    public function jsonSerialize(): mixed {
        return base64_encode($this->blob);
    }

    public function __equals(object $other): bool
    {
        if (!($other instanceof self)) {
            return false;
        }
        return $this->blob === $other->blob;
    }
}
