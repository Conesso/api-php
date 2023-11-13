<?php

use Conesso\Responses\Emails\EmailsBodyCurrentVersionResponse;
use Conesso\Responses\Emails\EmailsBodyResponse;
use Conesso\Responses\Emails\EmailsBodyVariationResponse;

test('from', function () {
    $response = EmailsBodyResponse::from(emailsBodyResource());

    expect($response)->toBeInstanceOf(EmailsBodyResponse::class)
        ->activeVariation->toBe('fer312s5b')
        ->variations->toBeArray()->toHaveCount(2)
        ->variations->each->toBeInstanceOf(EmailsBodyVariationResponse::class)
        ->currentVersion->toBeInstanceOf(EmailsBodyCurrentVersionResponse::class);
});
