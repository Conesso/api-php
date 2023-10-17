<?php

use Conesso\Responses\Carts\CreateResponse;
use Conesso\Responses\Carts\ListResponse;
use Conesso\Responses\Carts\RetrieveResponse;
use Conesso\Responses\Carts\UpdateResponse;
use Conesso\Responses\Meta\MetaInformation;
use Conesso\ValueObjects\Transporter\Response;

test('list', function () {
    $client = mockConessoClient('GET', 'carts', [], Response::from(cartsListResource(), metaResource()));

    $result = $client->carts()->list();

    expect($result)->toBeInstanceOf(ListResponse::class)
        ->data->toBeArray()->toHaveCount(2)
        ->data->each->toBeInstanceOf(RetrieveResponse::class);

    expect($result->meta())
        ->toBeInstanceOf(MetaInformation::class);
});

test('retrieve', function () {
    $client = mockConessoClient('GET', 'carts/1f6ef9fcd71f732c60af03d5fabc2033', [], Response::from(cartResource()));

    $result = $client->carts()->retrieve('1f6ef9fcd71f732c60af03d5fabc2033');

    expect($result)->toBeInstanceOf(RetrieveResponse::class)
        ->id->toBe('1f6ef9fcd71f732c60af03d5fabc2033')
        ->orderId->toBe(null)
        ->apiIntegration->toBe('conesso-api-client')
        ->apiResource->toBe('carts')
        ->apiReferenceId->toBe('870211')
        ->createdAt->toBe('2023-08-23T08:35:02.000Z')
        ->updatedAt->toBe('2023-08-23T08:35:02.000Z')
        ->cartCreatedAt->toBe('2023-08-22T14:26:51.000Z')
        ->cartUpdatedAt->toBe('2023-08-22T14:26:59.000Z')
        ->dateConfirmedIsAbandoned->toBe('2023-08-23T08:35:02.000Z')
        ->externalOrderId->toBe(null)
        ->isActive->toBe(false)
        ->totalIncTax->toBe(6000.0)
        ->isoCurrencyCode->toBe('GBP')
        ->abandonedTotal->toBe(6000.0)
        ->abandonedTotalWithDiscount->toBe(6000.0)
        ->abandonedTotalDiscount->toBe(0.0);
});

test('create', function () {
    $client = mockConessoClient('POST', 'carts', [], Response::from(cartResource()));

    $result = $client->carts()->create(cartResource());

    expect($result)->toBeInstanceOf(CreateResponse::class);
});

test('update', function () {
    $client = mockConessoClient('PUT', 'carts/1f6ef9fcd71f732c60af03d5fabc2033', [], Response::from(cartResource()));

    $result = $client->carts()->update('1f6ef9fcd71f732c60af03d5fabc2033', [
        'customerFirstname' => 'Adam',
        'customerLastname' => 'Paterson',
        'billingFirstname' => 'Adam',
        'billingLastname' => 'Paterson',
    ]);

    expect($result)->toBeInstanceOf(UpdateResponse::class);
});
