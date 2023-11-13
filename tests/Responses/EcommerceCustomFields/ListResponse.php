<?php

use Conesso\Responses\EcommerceCustomFields\ListResponse;
use Conesso\Responses\EcommerceCustomFields\RetrieveResponse;

test('from', function () {
    $response = ListResponse::from(ecommerceCustomFieldsListResource());

    expect($response)->toBeInstanceOf(ListResponse::class)
        ->customFields->toBeArray()
        ->customFields->each->toBeInstanceOf(RetrieveResponse::class);
});
