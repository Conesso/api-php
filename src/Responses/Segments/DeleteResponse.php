<?php

declare(strict_types=1);

namespace Conesso\Responses\Segments;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class DeleteResponse implements ResponseContract
{
    use ArrayAccessible;

    public int $id;
    public bool $deleted;

    public function __construct(int $id, bool $deleted)
    {
        $this->id = $id;
        $this->deleted = $deleted;
    }

    public static function from(array $data): self
    {
        return new self(
            (int) $data['id'],
            (bool) $data['deleted'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'deleted' => $this->deleted,
        ];
    }
}
