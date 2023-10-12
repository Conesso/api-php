<?php

use Conesso\Responses\Carts\ListResponse;
use Conesso\Responses\Carts\RetrieveResponse;
use Conesso\Responses\Meta\MetaInformation as MetaInformationAlias;

test('from', function () {
    $response = ListResponse::from(cartsListResource(), meta());

    expect($response)->toBeInstanceOf(ListResponse::class)
        ->data->toBeArray()->toHaveCount(2)
        ->data->each->toBeInstanceOf(RetrieveResponse::class)
        ->meta()->toBeInstanceOf(MetaInformationAlias::class);
});

test('array accessible', function () {
    $response = ListResponse::from(cartsListResource(), meta());

    expect($response['data'])->toBeArray();
});
