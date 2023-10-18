<?php

use Conesso\Responses\Meta\MetaInformation;
use Conesso\Responses\Products\ListResponse;
use Conesso\Responses\Products\RetrieveResponse;

test('from', function () {
    $response = ListResponse::from(productListResource(), meta());

    expect($response)->toBeInstanceOf(ListResponse::class)
        ->meta->toBeInstanceOf(MetaInformation::class)
        ->products->toBeArray()
        ->products->each->toBeInstanceOf(RetrieveResponse::class);
});
