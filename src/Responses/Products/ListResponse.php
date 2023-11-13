<?php

declare(strict_types=1);

namespace Conesso\Responses\Products;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;
use Conesso\Responses\Meta\MetaInformation;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;

    public array $products;

    public MetaInformation $meta;

    public function __construct(
        array $products,
        MetaInformation $meta
    ) {
        $this->products = $products;
        $this->meta = $meta;
    }

    public static function from(array $data, MetaInformation $meta): self
    {
        $products = array_map(fn (array $product): \Conesso\Responses\Products\RetrieveResponse => RetrieveResponse::from($product), $data);

        return new self(
            $products,
            $meta
        );
    }

    public function toArray(): array
    {
        return [
            'products' => array_map(fn (RetrieveResponse $product): array => $product->toArray(), $this->products),
            'meta' => $this->meta->toArray(),
        ];
    }
}
