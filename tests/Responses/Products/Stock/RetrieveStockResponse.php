<?php

use Conesso\Responses\Products\Stock\RetrieveStockResponse;

test('from', function () {
    $response = RetrieveStockResponse::from(productStockResource());

    expect($response)->toBeInstanceOf(RetrieveStockResponse::class)
        ->id->toBe('b79610411f9bebf24a08e8def82e6e28')
        ->productId->toBe('4fb79610411f9bebf24a08e8def82e6e')
        ->quantity->toBe(0)
        ->status->toBe('out-of-stock')
        ->createdAt->toBe('2023-08-23T13:45:44.000Z')
        ->updatedAt->toBe('2023-08-23T13:45:44.000Z');
});

test('to array', function () {
    $response = RetrieveStockResponse::from(productStockResource());

    expect($response->toArray())
        ->toBeArray()
        ->toBe(productStockResource());
});
