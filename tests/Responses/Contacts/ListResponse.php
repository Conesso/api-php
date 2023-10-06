<?php

use Conesso\Responses\Contacts\ListResponse;
use Conesso\Responses\Contacts\RetrieveResponse;
use Conesso\Responses\Meta\MetaInformation;

test('from', function () {
    $response = ListResponse::from(contactListResource(), meta());

    expect($response)
        ->toBeInstanceOf(ListResponse::class)
        ->data->toBeArray()->toHaveCount(4)
        ->data->each->toBeInstanceOf(RetrieveResponse::class)
        ->meta()->toBeInstanceOf(MetaInformation::class);
});
