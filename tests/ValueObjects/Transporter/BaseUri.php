<?php

use Conesso\ValueObjects\Transporter\BaseUri;

it('can create base from string', function () {
    $baseUri = BaseUri::from('https://api.conesso.io');

    expect($baseUri->toString())->toBe('https://api.conesso.io/');
});

it('can create base from string without protocol', function () {
    $baseUri = BaseUri::from('api.conesso.io');

    expect($baseUri->toString())->toBe('https://api.conesso.io/');
});
