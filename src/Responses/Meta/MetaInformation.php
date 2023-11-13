<?php

declare(strict_types=1);

namespace Conesso\Responses\Meta;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class MetaInformation implements ResponseContract
{
    use ArrayAccessible;

    public int $countPerPage;

    public int $page;

    public int $totalRecords;

    public string $timeZone;

    public int $totalRecordsWithFilters;

    public int $totalPages;

    public function __construct(
        int $countPerPage,
        int $page,
        int $totalRecords,
        string $timeZone,
        int $totalRecordsWithFilters,
        int $totalPages
    ) {
        $this->countPerPage = $countPerPage;
        $this->page = $page;
        $this->totalRecords = $totalRecords;
        $this->timeZone = $timeZone;
        $this->totalRecordsWithFilters = $totalRecordsWithFilters;
        $this->totalPages = $totalPages;
    }

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
        return [
            'countPerPage' => $this->countPerPage,
            'page' => $this->page,
            'totalRecords' => $this->totalRecords,
            'timeZone' => $this->timeZone,
            'totalRecordsWithFilters' => $this->totalRecordsWithFilters,
            'totalPages' => $this->totalPages,
        ];
    }
}
