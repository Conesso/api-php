<?php

declare(strict_types=1);

namespace Conesso\Responses\Lists;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;
use Conesso\Responses\Meta\MetaInformation;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;

    public array $lists;

    public ?MetaInformation $meta;

    public function __construct(array $lists, ?MetaInformation $meta)
    {
        $this->lists = $lists;
        $this->meta = $meta;
    }

    public static function from(array $data, ?MetaInformation $meta): self
    {
        $lists = array_map(fn (array $result): RetrieveResponse => RetrieveResponse::from(
            $result
        ), $data);

        return new self($lists, $meta);
    }

    public function toArray(): array
    {
        return [
            'lists' => array_map(fn (RetrieveResponse $list): array => $list->toArray(), $this->lists),
            'meta' => $this->meta instanceof \Conesso\Responses\Meta\MetaInformation ? $this->meta->toArray() : null,
        ];
    }
}
