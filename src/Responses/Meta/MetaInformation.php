<?php

declare(strict_types=1);

namespace Conesso\Responses\Meta;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class MetaInformation implements ResponseContract
{
    use ArrayAccessible;

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['countPerPage'],
            $attributes['page'],
            $attributes['totalRecords'],
            $attributes['timeZone'],
            $attributes['totalRecordsWithFilters'],
            $attributes['totalPages'],
        );
    }

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }
}
