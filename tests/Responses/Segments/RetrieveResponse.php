<?php

use Conesso\Responses\Segments\RetrieveResponse;

test('from', function () {
    $response = RetrieveResponse::from(segmentResource());

    expect($response)->toBeInstanceOf(RetrieveResponse::class)
        ->id->toBe(1)
        ->name->toBe('Segment 1')
        ->uid->toBe('sdfwers')
        ->description->toBe('Segment 1 description')
        ->autoRefresh->toBe(0)
        ->contactNo->toBe(03423423423);
});
