<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class CreateResponse implements ResponseContract
{
    use ArrayAccessible;

    public RetrieveResponse $email;

    public function __construct(RetrieveResponse $email)
    {
        $this->email = $email;
    }

    public static function from(array $data): self
    {
        return new self(RetrieveResponse::from($data));
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email->toArray(),
        ];
    }
}
