<?php

declare(strict_types=1);

namespace Conesso\Responses\Carts;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class DeleteResponse implements ResponseContract
{
    use ArrayAccessible;

    public string $id;

    public bool $deleted;

    public function __construct(string $id, bool $deleted)
    {
        $this->id = $id;
        $this->deleted = $deleted;
    }

    public static function from(string $id, array $data): self
    {
        return new self($id, $data['deleted'] ?? false);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'deleted' => $this->deleted,
        ];
    }
}
