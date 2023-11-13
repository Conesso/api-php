<?php

use Conesso\Responses\EcommerceCustomFields\RetrieveResponse;
use Conesso\Responses\EcommerceCustomFields\UpdateResponse;

test('from', function () {
    $response = UpdateResponse::from(ecommerceCustomFieldsResource());

    expect($response)->toBeInstanceOf(UpdateResponse::class)
        ->customField->toBeInstanceOf(RetrieveResponse::class);
});
