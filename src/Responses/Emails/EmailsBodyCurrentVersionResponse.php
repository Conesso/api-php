<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class EmailsBodyCurrentVersionResponse implements ResponseContract
{
    use ArrayAccessible;

    public string $variationUid;

    public string $uid;

    public EmailsBodyContentResponse $content;

    public function __construct(
        string $variationUid,
        string $uid,
        EmailsBodyContentResponse $content
    ) {
        $this->variationUid = $variationUid;
        $this->uid = $uid;
        $this->content = $content;
    }

    public static function from(array $data): self
    {

        return new self(
            $data['variationUid'],
            $data['uid'],
            EmailsBodyContentResponse::from($data['content'])
        );
    }

    public function toArray(): array
    {
        return [
            'variationUid' => $this->variationUid,
            'uid' => $this->uid,
            'content' => $this->content->toArray(),
        ];
    }
}
