<?php

declare(strict_types=1);

namespace Conesso\Responses\EcommerceCustomFields;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;

    /**
     * @var RetrieveResponse[]
     */
    public array $customFields;

    public function __construct(array $customFields)
    {
        $this->customFields = $customFields;
    }

    public static function from(array $data): self
    {
        $fields = array_map(fn (array $fields): RetrieveResponse => RetrieveResponse::from($fields), $data);

        return new self($fields);
    }

    public function toArray(): array
    {
        return [
            array_map(fn (RetrieveResponse $fields): array => $fields->toArray(), $this->customFields),
        ];
    }
}
