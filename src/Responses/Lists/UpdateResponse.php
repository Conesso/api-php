<?php

declare(strict_types=1);

namespace Conesso\Responses\Lists;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class UpdateResponse implements ResponseContract
{
    use ArrayAccessible;

    public RetrieveResponse $list;

    public function __construct(RetrieveResponse $list)
    {
        $this->list = $list;
    }

    public static function from(array $attributes): self
    {
        $list = RetrieveResponse::from($attributes);

        return new self($list);
    }

    public function toArray(): array
    {
        return $this->list->toArray();
    }
}
