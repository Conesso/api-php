<?php

declare(strict_types=1);

namespace Conesso\ValueObjects\Transporter;

final class QueryParams
{
    private array $params;

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public static function create(): self
    {
        return new self([]);
    }

    public function withParam(string $name, string $value): self
    {
        return new self([
            ...$this->params,
            $name => $value,
        ]);
    }

    public function withParams(array $params): self
    {
        return new self([
            ...$this->params,
            ...$params,
        ]);
    }

    public function toArray(): array
    {
        return $this->params;
    }
}
