<?php

use Conesso\ValueObjects\Transporter\Headers;

it('can create a new headers object', function () {
    $headers = new Headers([]);

    expect($headers)->toBeInstanceOf(Headers::class);
});

it('can create a new Headers with create method', function () {
    $headers = Headers::create();

    expect($headers)->toBeInstanceOf(Headers::class);
});

it('returns correct headers with Authorization', function () {
    $headers = Headers::create()->withAuthorization('test_api_key');

    expect($headers->toArray())->toBe([
        'api_key' => 'test_api_key',
    ]);
});

it('returns correct headers with ContentType', function () {
    $headers = Headers::create()->withContentType('application/json');

    expect($headers->toArray())->toBe([
        'Content-Type' => 'application/json',
    ]);
});

it('returns correct headers with custom header', function () {
    $headers = Headers::create()->withHeader('Custom-Header', 'custom value');

    expect($headers->toArray())->toBe([
        'Custom-Header' => 'custom value',
    ]);
});