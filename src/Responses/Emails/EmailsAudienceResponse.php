<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class EmailsAudienceResponse implements ResponseContract
{
    use ArrayAccessible;

    public array $lists;

    public array $segments;

    public function __construct(array $lists, array $segments)
    {
        $this->lists = $lists;
        $this->segments = $segments;
    }

    public static function from(array $data): self
    {
        $lists = array_map(fn (array $result): EmailsAudienceListResponse => EmailsAudienceListResponse::from(
            $result
        ), $data['lists']);

        return new self(
            $lists,
            $data['segments']
        );
    }

    public function toArray(): array
    {
        return [
            'lists' => array_map(static fn (EmailsAudienceListResponse $list): array => $list->toArray(), $this->lists),
            'segments' => $this->segments,
        ];
    }
}
