<?php

declare(strict_types=1);

namespace Conesso\ValueObjects;

use Conesso\Contracts\CreateFromStringContract;
use Conesso\Contracts\StringableContract;

final class ApiKey implements StringableContract, CreateFromStringContract
{
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public static function from(string $value): CreateFromStringContract
    {
        return new self($value);
    }

    public function toString(): string
    {
        return $this->apiKey;
    }
}
