<?php

declare(strict_types=1);

namespace Conesso\Responses\Products\Stock;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class RetrieveStockResponse implements ResponseContract
{
    use ArrayAccessible;

    public string $id;

    public string $productId;

    public int $quantity;

    public string $status;

    public string $createdAt;

    public string $updatedAt;

    public function __construct(
        string $id,
        string $productId,
        int $quantity,
        string $status,
        string $createdAt,
        string $updatedAt
    ) {
        $this->id = $id;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function from(array $data): self
    {
        return new self(
            $data['id'],
            $data['productId'],
            $data['quantity'],
            $data['status'],
            $data['createdAt'],
            $data['updatedAt'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'productId' => $this->productId,
            'quantity' => $this->quantity,
            'status' => $this->status,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }
}
