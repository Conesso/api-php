<?php

declare(strict_types=1);

namespace Conesso\Responses\CustomFields;

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

    public static function from(array $data, MetaInformation $meta): self
    {
        $data = array_map(fn (array $item): \Conesso\Responses\CustomFields\RetrieveResponse => RetrieveResponse::from($item), $data);

        return new self(
            $data,
            $meta,
        );
    }

    public function toArray(): array
    {
        return [
            array_map(fn (RetrieveResponse $item): array => $item->toArray(), $this->data),
            'meta' => $this->meta,
        ];
    }
}
