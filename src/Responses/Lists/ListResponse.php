<?php

declare(strict_types=1);

namespace Conesso\Responses\Lists;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;

    private array $lists;

    public function __construct(array $lists)
    {
        $this->lists = $lists;
    }

    public static function from(array $attributes): self
    {
        $lists = array_map(fn (array $result): RetrieveResponse => RetrieveResponse::from(
            $result
        ), $attributes);

        return new self($lists);
    }

    public function toArray(): array
    {
        return [
            array_map(static fn (RetrieveResponse $list): array => $list->toArray(), $this->lists),
        ];
    }
}
