<?php

declare(strict_types=1);

namespace Conesso\ValueObjects;

use Conesso\Contracts\StringableContract;

final class ResourceUri implements StringableContract
{
    private string $uri;

    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }

    public static function create(string $resource): self
    {
        return new self($resource);
    }

    public static function update(string $resource, string $id): self
    {
        return new self("{$resource}/{$id}");
    }

    public static function retrieve(string $resource, string $id, string $suffix = null): self
    {
        return new self("{$resource}/{$id}{$suffix}");
    }

    public static function delete(string $resource, string $id): self
    {
        return new self("{$resource}/{$id}");
    }

    public static function list(string $resource): self
    {
        return new self($resource);
    }

    public function toString(): string
    {
        return $this->uri;
    }
}
