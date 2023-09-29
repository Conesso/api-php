<?php

declare(strict_types=1);

namespace Conesso\Responses\Meta;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class MetaInformation implements ResponseContract
{
    use ArrayAccessible;

    public static function from(array $data): self
    {
        return new self(
            $data['countPerPage'],
            $data['page'],
            $data['totalRecords'],
            $data['timeZone'],
            $data['totalRecordsWithFilters'],
            $data['totalPages'],
        );
    }

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }
}
