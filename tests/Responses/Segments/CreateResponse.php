<?php

use Conesso\Responses\Segments\CreateResponse;
use Conesso\Responses\Segments\RetrieveResponse;

test('from', function () {
    $response = CreateResponse::from(segmentResource());

    expect($response)->toBeInstanceOf(CreateResponse::class)
        ->segment->toBeInstanceOf(RetrieveResponse::class);
});
