<?php

declare(strict_types=1);

namespace Conesso\Responses\Concerns;

trait ArrayAccessible
{
    #[\ReturnTypeWillChange]
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->toArray());
    }

    #[\ReturnTypeWillChange]
    public function offsetGet($offset): mixed
    {
        return $this->toArray()[$offset];
    }

    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value): void
    {

    }

    #[\ReturnTypeWillChange]
    public function offsetUnset($offset): void
    {

    }
}
