<?php

use Conesso\Responses\Emails\EmailsAudienceListResponse;

test('from', function () {
    $response = EmailsAudienceListResponse::from(emailsAudienceListResource());

    expect($response)->toBeInstanceOf(EmailsAudienceListResponse::class)
        ->id->toBe(2)
        ->name->toBe('ViewInBrowser');
});

test('to array', function () {
    $response = EmailsAudienceListResponse::from(emailsAudienceListResource());

    expect($response->toArray())
        ->toBeArray()
        ->toHaveCount(2)
        ->toHaveKeys([
            'id',
            'name',
        ]);

    expect($response->toArray())->toBe(emailsAudienceListResource());
});

test('array accessible', function () {
    $response = EmailsAudienceListResponse::from(emailsAudienceListResource());

    expect($response['id'])
        ->toBe(2)
        ->and($response['name'])
        ->toBe('ViewInBrowser');
});
