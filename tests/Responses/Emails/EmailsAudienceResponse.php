<?php

use Conesso\Responses\Emails\EmailsAudienceListResponse;
use Conesso\Responses\Emails\EmailsAudienceResponse;

test('from', function () {
    $response = EmailsAudienceResponse::from(emailsAudienceResource());

    expect($response)->toBeInstanceOf(EmailsAudienceResponse::class)
        ->lists->toBeArray()->toHaveCount(2)
        ->lists->each->toBeInstanceOf(EmailsAudienceListResponse::class);
});

test('to array', function () {
    $response = EmailsAudienceResponse::from(emailsAudienceResource());

    expect($response->toArray())
        ->toBeArray()
        ->toBe(emailsAudienceResource());
});
