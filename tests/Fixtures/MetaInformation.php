<?php

use Conesso\Responses\Meta\MetaInformation;

function metaResource(): array
{
    return [
        'countPerPage' => 4,
        'page' => 1,
        'totalRecords' => 27,
        'timeZone' => 'Europe/London',
        'totalRecordsWithFilters' => 27,
        'totalPages' => 7,
    ];
}

function meta(): MetaInformation
{
    return MetaInformation::from(metaResource());
}
