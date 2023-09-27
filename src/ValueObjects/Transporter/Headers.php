<?php

declare(strict_types=1);

namespace Conesso\ValueObjects\Transporter;

use Conesso\ValueObjects\ApiKey;

final class Headers
{
    private array $headers;

    public function __construct(array $headers)
    {
        $this->headers = $headers;
    }

    public static function create(): self
    {
        return new self([]);
    }

    public function withAuthorization(ApiKey $apiKey): self
    {
        return new self([
            ...$this->headers,
            'api_key' => $apiKey->toString(),
        ]);
    }

    public function withContentType(string $contentType): self
    {
        return new self([
            ...$this->headers,
            'Content-Type' => $contentType,
        ]);
    }

    public function withHeader(string $name, string $value): self
    {
        return new self([
            ...$this->headers,
            $name => $value,
        ]);
    }

    public function toArray(): array
    {
        return $this->headers;
    }
}
