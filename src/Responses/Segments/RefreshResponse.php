<?php

declare(strict_types=1);

namespace Conesso\Responses\Segments;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class RefreshResponse implements ResponseContract
{
    use ArrayAccessible;

    public int $id;

    public bool $success;

    public function __construct(int $id, bool $success)
    {
        $this->id = $id;
        $this->success = $success;
    }

    public static function from(array $data): self
    {
        return new self(
            (int) $data['id'],
            (bool) $data['success'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'success' => $this->success,
        ];
    }
}
