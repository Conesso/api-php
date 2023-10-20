<?php

use Conesso\Responses\Segments\RetrieveResponse;
use Conesso\Responses\Segments\UpdateResponse;

test('from', function () {
    $response = UpdateResponse::from(segmentResource());

    expect($response)->toBeInstanceOf(UpdateResponse::class)
        ->segment->toBeInstanceOf(RetrieveResponse::class);
});
