<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class UpdateResponse implements ResponseContract
{
    use ArrayAccessible;

    public RetrieveResponse $email;

    public function __construct(RetrieveResponse $email)
    {
        $this->email = $email;
    }

    public static function from(array $attributes): self
    {
        return new self(RetrieveResponse::from($attributes));
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email->toArray(),
        ];
    }
}
