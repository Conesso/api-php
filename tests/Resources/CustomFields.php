<?php

use Conesso\Responses\CustomFields\CreateResponse;
use Conesso\Responses\CustomFields\DeleteResponse;
use Conesso\Responses\CustomFields\ListResponse;
use Conesso\Responses\CustomFields\RetrieveResponse;
use Conesso\Responses\CustomFields\UpdateResponse;
use Conesso\ValueObjects\Transporter\Response;

test('list', function () {
    $client = mockConessoClient('GET', 'custom-fields', [], Response::from(customFieldsListResource(), metaResource()));

    $result = $client->customFields()->list();

    expect($result)->toBeInstanceOf(ListResponse::class)
        ->data->toBeArray()
        ->toHaveCount(3)
        ->each->toBeInstanceOf(RetrieveResponse::class);
});

test('retrieve', function () {
    $client = mockConessoClient('GET', 'custom-fields/1', [], Response::from(customFieldsResource()));

    $result = $client->customFields()->retrieve('1');

    expect($result)->toBeInstanceOf(RetrieveResponse::class)
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
        ->updatedBy->toBe('Test User');
});

test('create', function () {
    $client = mockConessoClient('POST', 'custom-fields', [], Response::from(customFieldsResource()));

    $result = $client->customFields()->create([
        'name' => 'Custom Field 1',
        'dataType' => 'string',
    ]);

    expect($result)->toBeInstanceOf(CreateResponse::class)
        ->id->toBe(4)
        ->name->toBe('Custom Field 1')
        ->dataType->toBe('string')
        ->nameKey->toBe('custom_field_1')
        ->description->toBe('Custom Field 1 Description')
        ->defaultValue->toBe('Custom Field 1 Default Value')
        ->isPrivate->toBeFalse();
});

test('update', function () {
    $client = mockConessoClient('PUT', 'custom-fields/1', [], Response::from(customFieldsResource()));

    $result = $client->customFields()->update('1', [
        'name' => 'Custom Field 1',
        'dataType' => 'string',
        'nameKey' => 'custom_field_1',
        'description' => 'Custom Field 1 Description',
        'defaultValue' => 'Custom Field 1 Default Value',
        'isPrivate' => false,
    ]);

    expect($result)->toBeInstanceOf(UpdateResponse::class)
        ->id->toBe(4)
        ->name->toBe('Custom Field 1')
        ->dataType->toBe('string')
        ->nameKey->toBe('custom_field_1')
        ->description->toBe('Custom Field 1 Description')
        ->defaultValue->toBe('Custom Field 1 Default Value')
        ->isPrivate->toBeFalse();
});

test('delete', function () {
    $client = mockConessoClient('DELETE', 'custom-fields/1', [], Response::from(customFieldsDeleteResource()));

    $result = $client->customFields()->delete('1');

    expect($result)->toBeInstanceOf(DeleteResponse::class);

});
