<?php

declare(strict_types=1);

namespace Conesso\Responses\Products;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class CreateResponse implements ResponseContract
{
    use ArrayAccessible;

    public RetrieveResponse $product;

    public function __construct(RetrieveResponse $product)
    {
        $this->product = $product;
    }

    public static function from(array $data): self
    {
        return new self(RetrieveResponse::from($data));
    }

    public function toArray(): array
    {
        return [
            'product' => $this->product->toArray(),
        ];
    }
}
