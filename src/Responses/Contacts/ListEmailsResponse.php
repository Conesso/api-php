<?php

declare(strict_types=1);

namespace Conesso\Responses\Contacts;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;
use Conesso\Responses\Concerns\HasMetaInformation;
use Conesso\Responses\Meta\MetaInformation;

final class ListEmailsResponse implements ResponseContract
{
    use ArrayAccessible;
    use HasMetaInformation;

    private array $emails;

    private ?MetaInformation $meta;

    public function __construct(array $emails, ?MetaInformation $meta)
    {
        $this->emails = $emails;
        $this->meta = $meta;
    }

    public static function from(array $attributes, ?MetaInformation $meta): self
    {
        return new self(
            $attributes['emails'],
            $meta
        );
    }

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }
}
