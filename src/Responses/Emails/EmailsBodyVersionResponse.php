<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class EmailsBodyVersionResponse implements ResponseContract
{
    use ArrayAccessible;

    public int $id;

    public string $uid;

    public EmailBodyContentContract $content;

    public function __construct(
        int $id,
        string $uid,
        EmailBodyContentContract $content
    ) {
        $this->id = $id;
        $this->uid = $uid;
        $this->content = $content;
    }

    public static function from(array $data): self
    {
        if (is_string($data['content'])) {
            $content = EmailsBodyContentStringResponse::from($data['content']);
        } else {
            $content = EmailsBodyContentResponse::from($data['content']);
        }

        return new self(
            (int) $data['id'],
            $data['uid'],
            $content
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'uid' => $this->uid,
            'content' => $this->content->toArray(),
        ];
    }
}
