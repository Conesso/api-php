<?php

use Conesso\Responses\Meta\MetaInformation;
use Conesso\Responses\Products\CreateResponse;
use Conesso\Responses\Products\DeleteResponse;
use Conesso\Responses\Products\ListResponse;
use Conesso\Responses\Products\RetrieveResponse;
use Conesso\Responses\Products\Stock\RetrieveStockResponse;
use Conesso\Responses\Products\Stock\UpdateStockResponse;
use Conesso\Responses\Products\UpdateResponse;
use Conesso\ValueObjects\Transporter\Response;

test('list', function () {
    $client = mockConessoClient(
        'GET',
        'products',
        [],
        Response::from(productListResource(), metaResource())
    );

    $response = $client->products()->list();

    expect($response)->toBeInstanceOf(ListResponse::class)
        ->products->toBeArray()
        ->products->each->toBeInstanceOf(RetrieveResponse::class)
        ->meta->toBeInstanceOf(MetaInformation::class);
});

test('retrieve', function () {
    $client = mockConessoClient(
        'GET',
        'products/4fb79610411f9bebf24a08e8def82e6e',
        [],
        Response::from(productResource())
    );

    $response = $client->products()->retrieve('4fb79610411f9bebf24a08e8def82e6e');

    expect($response)->toBeInstanceOf(RetrieveResponse::class)
        ->id->toBe('4fb79610411f9bebf24a08e8def82e6e')
        ->name->toBe('Test Product')
        ->description->toBeNull()
        ->sku->toBe('SKU-123');
});

test('create', function () {
    $client = mockConessoClient(
        'POST',
        'products',
        [],
        Response::from(productResource())
    );

    $response = $client->products()->create([]);

    expect($response)->toBeInstanceOf(CreateResponse::class)
        ->product->toBeInstanceOf(RetrieveResponse::class);
});

test('update', function () {
    $client = mockConessoClient(
        'PUT',
        'products/4fb79610411f9bebf24a08e8def82e6e',
        [],
        Response::from(productResource())
    );

    $response = $client->products()->update('4fb79610411f9bebf24a08e8def82e6e', []);

    expect($response)->toBeInstanceOf(UpdateResponse::class)
        ->product->toBeInstanceOf(RetrieveResponse::class);
});

test('delete', function () {
    $client = mockConessoClient(
        'DELETE',
        'products/4fb79610411f9bebf24a08e8def82e6e',
        [],
        Response::from(['deleted' => true])
    );

    $response = $client->products()->delete('4fb79610411f9bebf24a08e8def82e6e');

    expect($response)->toBeInstanceOf(DeleteResponse::class)
        ->id->toBe('4fb79610411f9bebf24a08e8def82e6e')
        ->deleted->toBeTrue();
});

test('retrieveStock', function () {
    $client = mockConessoClient(
        'GET',
        'products/stock/4fb79610411f9bebf24a08e8def82e6e',
        [],
        Response::from(productStockResource())
    );

    $response = $client->products()->stock('4fb79610411f9bebf24a08e8def82e6e');

    expect($response)->toBeInstanceOf(RetrieveStockResponse::class)
        ->id->toBe('b79610411f9bebf24a08e8def82e6e28')
        ->productId->toBe('4fb79610411f9bebf24a08e8def82e6e')
        ->quantity->toBe(0)
        ->status->toBe('out-of-stock')
        ->createdAt->toBe('2023-08-23T13:45:44.000Z')
        ->updatedAt->toBe('2023-08-23T13:45:44.000Z');

});

test('updateStock', function () {
    $client = mockConessoClient(
        'PUT',
        'products/stock/4fb79610411f9bebf24a08e8def82e6e',
        ['quantity' => 10],
        Response::from(productStockResource())
    );

    $response = $client
        ->products()
        ->updateStock('4fb79610411f9bebf24a08e8def82e6e', [
            'quantity' => 10,
        ]
        );

    expect($response)->toBeInstanceOf(UpdateStockResponse::class)
        ->stock->toBeInstanceOf(RetrieveStockResponse::class);
});
