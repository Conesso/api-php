<?php

declare(strict_types=1);

namespace Conesso\Responses\EcommerceCustomFields;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class CreateResponse implements ResponseContract
{
    use ArrayAccessible;

    public RetrieveResponse $field;

    public function __construct(RetrieveResponse $field)
    {
        $this->field = $field;
    }

    public static function from(array $data): self
    {
        return new self(RetrieveResponse::from($data));
    }

    public function toArray(): array
    {
        return [
            $this->field->toArray(),
        ];
    }
}
