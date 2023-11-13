<?php

use Conesso\ValueObjects\ApiKey;

it('can create a new ApiKey', function () {
    $apiKey = new ApiKey('foo');

    expect($apiKey)->toBeInstanceOf(ApiKey::class);
});

it('can create a new ApiKey from string', function () {
    $apiKey = ApiKey::from('foo');

    expect($apiKey)->toBeInstanceOf(ApiKey::class);
});

it('returns correct string with toString', function () {
    $apiKey = new ApiKey('foo');

    expect($apiKey->toString())->toBe('foo');
});
