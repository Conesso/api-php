<?php

declare(strict_types=1);

namespace Conesso\Responses\Contacts;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;
use Conesso\Responses\Concerns\HasMetaInformation;
use Conesso\Responses\Meta\MetaInformation;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;
    use HasMetaInformation;

    public array $data;

    public MetaInformation $meta;

    public function __construct(array $data, MetaInformation $meta)
    {
        $this->data = $data;
        $this->meta = $meta;
    }

    public static function from(array $attributes, MetaInformation $meta): self
    {
        $data = array_map(fn (array $result): RetrieveResponse => RetrieveResponse::from($result), $attributes);

        return new self(
            $data,
            $meta
        );
    }

    public function toArray(): array
    {
        return [
            'data' => array_map(
                static fn (RetrieveResponse $response): array => $response->toArray(),
                $this->data
            ),
        ];
    }
}
