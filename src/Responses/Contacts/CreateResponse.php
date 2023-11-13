<?php

declare(strict_types=1);

namespace Conesso\Responses\Contacts;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class CreateResponse implements ResponseContract
{
    /**
     * @var \Conesso\Responses\Contacts\RetrieveResponse
     */
    public $contact;

    use ArrayAccessible;

    public function __construct(RetrieveResponse $contact)
    {
        $this->contact = $contact;
    }

    public static function from(array $attributes): self
    {
        //@todo extract to concrete implementation
        return new self(
            RetrieveResponse::from($attributes)
        );
    }

    public function toArray(): array
    {
        //@todo extract to concrete implementation
        return [
            $this->contact->toArray(),
        ];
    }
}
