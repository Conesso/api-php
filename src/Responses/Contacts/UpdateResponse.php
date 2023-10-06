<?php

declare(strict_types=1);

namespace Conesso\Responses\Contacts;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class UpdateResponse implements ResponseContract
{
    use ArrayAccessible;

    private RetrieveResponse $retrieveResponse;

    public function __construct(RetrieveResponse $retrieveResponse)
    {
        $this->retrieveResponse = $retrieveResponse;
    }

    public static function from(array $attributes): self
    {
        return new self(RetrieveResponse::from($attributes));
    }

    public function toArray(): array
    {
        return $this->retrieveResponse->toArray();
    }
}
