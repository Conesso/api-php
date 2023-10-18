<?php

declare(strict_types=1);

namespace Conesso\Responses\EcommerceCustomFields;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class UpdateResponse implements ResponseContract
{
    use ArrayAccessible;

    public RetrieveResponse $customField;

    public function __construct(RetrieveResponse $customField)
    {
        $this->customField = $customField;
    }

    public static function from(array $data): self
    {
        return new self(RetrieveResponse::from($data));
    }

    public function toArray(): array
    {
        return [
            $this->customField->toArray(),
        ];
    }
}
