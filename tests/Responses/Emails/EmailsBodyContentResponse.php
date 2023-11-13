<?php

use Conesso\Responses\Emails\EmailsBodyContentResponse;

test('from', function () {
    $response = EmailsBodyContentResponse::from(emailBodyVersionContentResource());

    expect($response)->toBeInstanceOf(EmailsBodyContentResponse::class)
        ->jsonContent->toBe('{"page" {"body" {"rows" []}}}')
        ->htmlContent->toBe('<html><head></head><body>EMAIL CONTENT</body></html>')
        ->txtContent->toBe('EMAIL CONTENT');
});

test('to array', function () {
    $response = EmailsBodyContentResponse::from(emailBodyVersionContentResource());

    expect($response->toArray())
        ->toBeArray()
        ->toBe(emailBodyVersionContentResource());
});
