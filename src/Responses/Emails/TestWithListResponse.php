<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class TestWithListResponse implements ResponseContract
{
    use ArrayAccessible;

    public int $id;

    public int $listId;

    public bool $success;

    public function __construct(int $id, int $listId, bool $success)
    {
        $this->id = $id;
        $this->listId = $listId;
        $this->success = $success;
    }

    public static function from(int $id, int $listId, array $data): self
    {
        return new self($id, $listId, $data['success'] ?? false);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'list_id' => $this->listId,
            'success' => $this->success,
        ];
    }
}
