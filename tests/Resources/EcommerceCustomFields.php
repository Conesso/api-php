<?php

use Conesso\Responses\EcommerceCustomFields\CreateResponse;
use Conesso\Responses\EcommerceCustomFields\DeleteResponse;
use Conesso\Responses\EcommerceCustomFields\ListResponse;
use Conesso\Responses\EcommerceCustomFields\RetrieveResponse;
use Conesso\Responses\EcommerceCustomFields\UpdateResponse;
use Conesso\ValueObjects\Transporter\Response;

test('retrieve', function () {
    $client = mockConessoClient(
        'GET',
        'ecommerce/custom-fields/1',
        [],
        Response::from(ecommerceCustomFieldsResource())
    );

    $response = $client->ecommerceCustomFields()->retrieve(1);

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

test('list', function () {
    $client = mockConessoClient(
        'GET',
        'ecommerce/custom-fields',
        [],
        Response::from(ecommerceCustomFieldsListResource())
    );

    $response = $client->ecommerceCustomFields()->list();

    expect($response)->toBeInstanceOf(ListResponse::class)
        ->customFields->toBeArray()
        ->customFields->each->toBeInstanceOf(RetrieveResponse::class);
});

test('create', function () {
    $client = mockConessoClient(
        'POST',
        'ecommerce/custom-fields',
        [],
        Response::from(ecommerceCustomFieldsResource())
    );

    $response = $client->ecommerceCustomFields()->create([]);

    expect($response)->toBeInstanceOf(CreateResponse::class)
        ->field->toBeInstanceOf(RetrieveResponse::class);
});

test('update', function () {
    $client = mockConessoClient(
        'PUT',
        'ecommerce/custom-fields/1',
        [],
        Response::from(ecommerceCustomFieldsResource())
    );

    $response = $client->ecommerceCustomFields()->update('1', []);

    expect($response)->toBeInstanceOf(UpdateResponse::class)
        ->customField->toBeInstanceOf(RetrieveResponse::class);
});

test('delete', function () {
    $client = mockConessoClient(
        'DELETE',
        'ecommerce/custom-fields/1',
        [],
        Response::from(['id' => 1, 'deleted' => true])
    );

    $response = $client->ecommerceCustomFields()->delete('1');

    expect($response)->toBeInstanceOf(DeleteResponse::class)
        ->id->toBe(1)
        ->deleted->toBeTrue();
});
