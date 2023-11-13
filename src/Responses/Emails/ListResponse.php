<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;
use Conesso\Responses\Meta\MetaInformation;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;

    public array $emails;

    public ?MetaInformation $meta;

    public function __construct(array $emails, ?MetaInformation $meta)
    {
        $this->emails = $emails;
        $this->meta = $meta;
    }

    public static function from(array $data, ?MetaInformation $meta): self
    {
        $emails = array_map(fn ($email): RetrieveResponse => RetrieveResponse::from($email), $data);

        return new self($emails, $meta);
    }

    public function toArray(): array
    {
        return [
            'emails' => array_map(fn ($email) => $email->toArray(), $this->emails),
            'meta' => $this->meta->toArray(),
        ];
    }
}
