<?php

use Conesso\Responses\Meta\MetaInformation;
use Conesso\Responses\Segments\ListResponse;
use Conesso\Responses\Segments\RetrieveResponse;

test('from', function () {
    $response = ListResponse::from(segmentListResource(), meta());

    expect($response)->toBeInstanceOf(ListResponse::class)
        ->segments->toBeArray()->toHaveCount(2)
        ->segments->each->toBeInstanceOf(RetrieveResponse::class)
        ->meta->toBeInstanceOf(MetaInformation::class);
});
