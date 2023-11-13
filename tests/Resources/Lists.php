<?php

use Conesso\Responses\Lists\CreateResponse;
use Conesso\Responses\Lists\DeleteResponse;
use Conesso\Responses\Lists\ListResponse;
use Conesso\Responses\Lists\RetrieveResponse;
use Conesso\Responses\Lists\UpdateResponse;
use Conesso\ValueObjects\Transporter\Response;

test('retrieve', function () {
    $client = mockConessoClient(
        'GET',
        'lists/1',
        [],
        Response::from(listResource())
    );

    $response = $client->lists()->retrieve(1);

    expect($response)->toBeInstanceOf(RetrieveResponse::class)
        ->id->toBe(1)
        ->name->toBe('Test List')
        ->description->toBe('Test List Description')
        ->isPrivate->toBeTrue()
        ->optInRequired->toBeTrue()
        ->contactNo->toBe(0)
        ->tags->toBeArray()
        ->tags->toHaveCount(2)
        ->createdAt->toBe('2021-01-01T00:00:00.000Z')
        ->createdBy->toBe('Test User')
        ->updatedAt->toBe('2021-01-01T00:00:00.000Z')
        ->updatedBy->toBe('Test User')
        ->status->toBe('active');
});

test('list', function () {
    $client = mockConessoClient(
        'GET',
        'lists',
        [],
        Response::from(listListResource(), metaResource())
    );

    $response = $client->lists()->list();

    expect($response)->toBeInstanceOf(ListResponse::class)
        ->lists->toBeArray()
        ->lists->each->toBeInstanceOf(RetrieveResponse::class);
});

test('create', function () {
    $client = mockConessoClient(
        'POST',
        'lists',
        [],
        Response::from(listResource())
    );

    $response = $client->lists()->create(listResource());

    expect($response)->toBeInstanceOf(CreateResponse::class)
        ->list->toBeInstanceOf(RetrieveResponse::class);
});

test('update', function () {
    $client = mockConessoClient(
        'PUT',
        'lists/1',
        [],
        Response::from(listResource())
    );

    $response = $client->lists()->update(1, listResource());

    expect($response)->toBeInstanceOf(UpdateResponse::class)
        ->list->toBeInstanceOf(RetrieveResponse::class);
});

test('delete', function () {
    $client = mockConessoClient(
        'DELETE',
        'lists/1',
        [],
        Response::from(['id' => 1, 'deleted' => true])
    );

    $response = $client->lists()->delete(1);

    expect($response)->toBeInstanceOf(DeleteResponse::class)
        ->id->toBe(1)
        ->deleted->toBeTrue();
});
