<?php

use Conesso\Responses\Contacts\RetrieveResponse;

test('from', function () {
    $result = RetrieveResponse::from(contactResource());

    expect($result)->toBeInstanceOf(RetrieveResponse::class)
        ->id->toBe(17)
        ->name->toBe('Doe John')
        ->email->toBe('john@conesso.io')
        ->firstName->toBe('Doe')
        ->lastName->toBe('John');
});
