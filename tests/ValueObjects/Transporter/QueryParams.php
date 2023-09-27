<?php

use Conesso\ValueObjects\Transporter\QueryParams;

it('can create a new QueryParams', function () {
    $queryParams = new QueryParams([]);

    expect($queryParams)->toBeInstanceOf(QueryParams::class);
});

it('can create a new QueryParams with create method', function () {
    $queryParams = QueryParams::create();

    expect($queryParams)->toBeInstanceOf(QueryParams::class);
});

it('returns correct params with withParam', function () {
    $queryParams = QueryParams::create()->withParam('test', 'value');

    expect($queryParams->toArray())->toBe([
        'test' => 'value',
    ]);
});

it('returns correct params with multiple withParam', function () {
    $queryParams = QueryParams::create()->withParam('test', 'value')->withParam('another_test', 'another_value');

    expect($queryParams->toArray())->toBe([
        'test' => 'value',
        'another_test' => 'another_value',
    ]);
});

it('returns correct params with withParams', function () {
    $queryParams = QueryParams::create()->withParams([
        'test' => 'value',
        'another_test' => 'another_value',
    ]);

    expect($queryParams->toArray())->toBe([
        'test' => 'value',
        'another_test' => 'another_value',
    ]);
});
