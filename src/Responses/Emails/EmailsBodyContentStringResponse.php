<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Responses\Concerns\ArrayAccessible;

final class EmailsBodyContentStringResponse implements EmailBodyContentContract
{
    use ArrayAccessible;

    public string $content;

    public function __construct(
        string $content
    ) {
        $this->content = $content;
    }

    public static function from(string $content): self
    {
        return new self($content);
    }

    public function toArray(): array
    {
        return [
            'content' => $this->content,
        ];
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
