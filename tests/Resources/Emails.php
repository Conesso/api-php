<?php

use Conesso\Responses\Emails\CreateResponse;
use Conesso\Responses\Emails\DeleteResponse;
use Conesso\Responses\Emails\RetrieveResponse;
use Conesso\Responses\Emails\UpdateResponse;
use Conesso\ValueObjects\Transporter\Response;

test('list', function () {
    $client = mockConessoClient('GET', 'emails', [], Response::from(emailListResource(), metaResource()));

    $result = $client->emails()->list();

});

test('retrieve', function () {
    $client = mockConessoClient('GET', 'emails/4', [], Response::from(emailResource()));

    $result = $client->emails()->retrieve('4');

    expect($result)->toBeInstanceOf(RetrieveResponse::class)
        ->id->toBe(4)
        ->name->toBe('Order Confirmation')
        ->subject->toBe('Order Confirmation');

});

test('create', function () {
    $client = mockConessoClient('POST', 'emails', [], Response::from(cartResource()));

    $result = $client->emails()->create(cartResource());

    expect($result)->toBeInstanceOf(CreateResponse::class);
});

test('update', function () {
    $client = mockConessoClient('PUT', 'emails/1f6ef9fcd71f732c60af03d5fabc2033', [], Response::from(cartResource()));

    $result = $client->emails()->update('1f6ef9fcd71f732c60af03d5fabc2033', [
        'customerFirstname' => 'Adam',
        'customerLastname' => 'Paterson',
        'billingFirstname' => 'Adam',
        'billingLastname' => 'Paterson',
    ]);

    expect($result)->toBeInstanceOf(UpdateResponse::class);
});

test('delete', function () {
    $client = mockConessoClient('DELETE', 'emails/1f6ef9fcd71f732c60af03d5fabc2033', [], Response::from(cartDeleteResource()));

    $result = $client->emails()->delete('1f6ef9fcd71f732c60af03d5fabc2033');

    expect($result)->toBeInstanceOf(DeleteResponse::class)
        ->id->toBe('1f6ef9fcd71f732c60af03d5fabc2033')
        ->deleted->toBe(true);
});
