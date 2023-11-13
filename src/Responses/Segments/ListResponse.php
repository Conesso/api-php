<?php

declare(strict_types=1);

namespace Conesso\Responses\Segments;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;
use Conesso\Responses\Meta\MetaInformation;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;

    public array $segments;

    public MetaInformation $meta;

    public function __construct(array $segments, MetaInformation $meta)
    {
        $this->segments = $segments;
        $this->meta = $meta;
    }

    public static function from(array $data, MetaInformation $meta): self
    {
        $segments = array_map(static fn (array $segment): \Conesso\Responses\Segments\RetrieveResponse => RetrieveResponse::from($segment), $data);

        return new self(
            $segments,
            $meta
        );
    }

    public function toArray(): array
    {
        return [
            'segments' => array_map(static fn (RetrieveResponse $segment): array => $segment->toArray(), $this->segments),
            'meta' => $this->meta->toArray(),
        ];
    }
}
