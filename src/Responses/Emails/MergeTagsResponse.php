<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class MergeTagsResponse implements ResponseContract
{
    use ArrayAccessible;

    public int $id;

    public array $mergedTags;

    public function __construct(int $id, array $mergedTags = [])
    {
        $this->id = $id;
        $this->mergedTags = $mergedTags;
    }

    public static function from(int $id, array $data): self
    {
        return new self($id, $data['mergedTags'] ?? []);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'mergedTags' => $this->mergedTags,
        ];
    }
}
