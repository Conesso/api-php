<?php

use Conesso\Responses\EcommerceCustomFields\RetrieveResponse;

test('from', function () {
    $response = RetrieveResponse::from(ecommerceCustomFieldsResource());

    expect($response)->toBeInstanceOf(RetrieveResponse::class)
        ->id->toBe(4)
        ->name->toBe('Custom Field 1')
        ->dataType->toBe('string')
        ->nameKey->toBe('custom_field_1')
        ->description->toBe('Custom Field 1 Description')
        ->defaultValue->toBe('Custom Field 1 Default Value')
        ->isPrivate->toBeFalse()
        ->createdAt->toBe('2023-06-20T09:14:15.000Z')
        ->createdBy->toBe('Test User')
        ->updatedAt->toBe('2023-06-20T09:14:15.000Z')
        ->updatedBy->toBe('Test User')
        ->ecommerceType->toBe('all');
});
