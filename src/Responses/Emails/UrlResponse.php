<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class UrlResponse implements ResponseContract
{
    use ArrayAccessible;

    public array $urls;

    public function __construct(array $urls)
    {
        $this->urls = $urls;
    }

    public static function from(array $data): self
    {
        return new self($data);
    }

    public function toArray(): array
    {
        return [
            'urls' => $this->urls,
        ];
    }
}
