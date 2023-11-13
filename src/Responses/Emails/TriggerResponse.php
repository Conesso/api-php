<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class TriggerResponse implements ResponseContract
{
    use ArrayAccessible;

    public int $id;

    public bool $success;

    public function __construct(int $id, bool $success)
    {
        $this->id = $id;
        $this->success = $success;
    }

    public static function from(int $id, array $data): self
    {
        return new self($id, $data['success'] ?? false);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'success' => $this->success,
        ];
    }
}
