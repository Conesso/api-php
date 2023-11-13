<?php

use Conesso\Responses\Meta\MetaInformation;

test('from', function () {
    $result = MetaInformation::from(metaResource());

    expect($result)->toBeInstanceOf(MetaInformation::class)
        ->countPerPage->toBe(4)
        ->page->toBe(1)
        ->totalRecords->toBe(27)
        ->timeZone->toBe('Europe/London')
        ->totalRecordsWithFilters->toBe(27)
        ->totalPages->toBe(7);
});
