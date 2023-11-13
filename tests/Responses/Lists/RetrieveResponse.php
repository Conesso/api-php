<?php

use Conesso\Responses\Lists\RetrieveResponse;

test('from', function () {
    $response = RetrieveResponse::from(listResource());

    expect($response)->toBeInstanceOf(RetrieveResponse::class)
        ->id->toBe(1)
        ->name->toBe('Test List')
        ->description->toBe('Test List Description')
        ->isPrivate->toBeTrue()
        ->optInRequired->toBeTrue()
        ->contactNo->toBe(0)
        ->tags->toBeArray()
        ->createdAt->toBe('2021-01-01T00:00:00.000Z')
        ->createdBy->toBe('Test User')
        ->updatedAt->toBe('2021-01-01T00:00:00.000Z')
        ->updatedBy->toBe('Test User')
        ->status->toBe('active');
});

test('to array', function () {
    $response = RetrieveResponse::from(listResource());

    expect($response)->toBeInstanceOf(RetrieveResponse::class)
        ->toArray()->toBeArray()
        ->toArray()->toHaveCount(12)
        ->toBe(listResource());
});
