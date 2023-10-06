<?php

use Conesso\Responses\Carts\ListResponse;
use Conesso\Responses\Carts\RetrieveResponse;
use Conesso\Responses\Meta\MetaInformation as MetaInformationAlias;

test('from', function () {
    $response = ListResponse::from(cartsResource(), meta());

    expect($response)->toBeInstanceOf(ListResponse::class)
        ->data->toBeArray()->toHaveCount(3)
        ->data->each->toBeInstanceOf(RetrieveResponse::class)
        ->meta()->toBeInstanceOf(MetaInformationAlias::class);
});

test('array accessible', function () {
    $response = ListResponse::from(cartsResource(), meta());

    expect($response['data'])->toBeArray();
});
