<?php

use Conesso\Responses\EcommerceCustomFields\CreateResponse;
use Conesso\Responses\EcommerceCustomFields\RetrieveResponse;

test('from', function () {
    $response = CreateResponse::from(ecommerceCustomFieldsResource());

    expect($response)->toBeInstanceOf(CreateResponse::class)
        ->field->toBeInstanceOf(RetrieveResponse::class);
});
