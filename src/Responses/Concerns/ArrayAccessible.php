<?php

declare(strict_types=1);

namespace Conesso\Responses\Concerns;

trait ArrayAccessible
{
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->toArray());
    }

    public function offsetGet($offset): mixed
    {
        return $this->toArray()[$offset];
    }

    public function offsetSet($offset, $value): void
    {

    }

    public function offsetUnset($offset): void
    {

    }
}
