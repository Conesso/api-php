<?php

declare(strict_types=1);

namespace Conesso\ValueObjects\Transporter;

use Conesso\Responses\Concerns\ArrayAccessible;
use Conesso\Responses\Meta\MetaInformation;

final class Response
{
    use ArrayAccessible;

    public array $data;

    public ?MetaInformation $meta;

    public function __construct(array $data, MetaInformation $meta = null)
    {
        $this->data = $data;
        $this->meta = $meta;
    }

    public static function from(array $data, array $meta = []): self
    {
        return new self($data, MetaInformation::from($meta));
    }

    public function toArray(): array
    {
        return [
            'data' => $this->data,
            'meta' => $this->meta,
        ];
    }

    public function data(): array
    {
        return $this->data;
    }

    public function meta(): ?MetaInformation
    {
        return $this->meta;
    }
}
