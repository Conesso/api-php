<?php

declare(strict_types=1);

namespace Conesso\Responses\Products\Stock;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class UpdateStockResponse implements ResponseContract
{
    use ArrayAccessible;

    public RetrieveStockResponse $stock;

    public function __construct(RetrieveStockResponse $stock)
    {
        $this->stock = $stock;
    }

    public static function from(array $data): self
    {
        return new self(RetrieveStockResponse::from($data));
    }

    public function toArray(): array
    {
        return [
            'stock' => $this->stock->toArray(),
        ];
    }
}
