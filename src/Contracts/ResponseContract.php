<?php

declare(strict_types=1);

namespace Conesso\Contracts;

use ArrayAccess;

interface ResponseContract extends ArrayAccess
{
    #[\ReturnTypeWillChange]
    public function toArray(): array;

    #[\ReturnTypeWillChange]
    public function offsetExists($offset): bool;

    #[\ReturnTypeWillChange]
    public function offsetGet($offset): mixed;

    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value);

    #[\ReturnTypeWillChange]
    public function offsetUnset($offset);

    public static function from(array $attributes): self;
}
