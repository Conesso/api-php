<?php

declare(strict_types=1);

namespace Conesso\ValueObjects\Transporter;

use Conesso\Contracts\CreateFromStringContract;
use Conesso\Contracts\StringableContract;

final class BaseUri implements CreateFromStringContract, StringableContract
{
    private string $baseUri;

    public function __construct(string $baseUri)
    {
        $this->baseUri = $baseUri;
    }

    public static function from(string $value): self
    {
        return new self($value);
    }

    public function toString(): string
    {
        foreach (['http://', 'https://'] as $protocol) {
            if (str_starts_with($this->baseUri, $protocol)) {
                return "{$this->baseUri}/";
            }
        }

        return "https://{$this->baseUri}/";
    }
}
