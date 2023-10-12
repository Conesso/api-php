<?php

use Conesso\Responses\Carts\RetrieveResponse;

test('from', function () {
    $response = RetrieveResponse::from(cartResource());

    expect($response)->toBeInstanceOf(RetrieveResponse::class)
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
        ->abandonedTotalDiscount->toBe(0.0)
        ->customerEmail->toBe('adam.paterson@conesso.io')
        ->customerLastname->toBe(null)
        ->customerGender->toBe('')
        ->customerTelephone->toBe('+443839484958')
        ->customerMobile->toBe('')
        ->customerIsGuest->toBe(true)
        ->customerNotes->toBe('')
        ->billingFirstname->toBe('Adam')
        ->billingLastname->toBe('Paterson')
        ->billingAddress1->toBe('123 Test Road')
        ->billingAddress2->toBe('Testing Lane')
        ->billingCity->toBe('TestVille')
        ->billingCounty->toBe('TestingShire')
        ->billingPostcode->toBe('TS1 1ST')
        ->billingCountry->toBe('GB')
        ->shippingFirstname->toBe('Adam')
        ->shippingLastname->toBe('Paterson')
        ->shippingAddress1->toBe('123 Test Road')
        ->shippingAddress2->toBe('Testing Lane')
        ->shippingCity->toBe('TestVille')
        ->shippingCounty->toBe('TestingShire')
        ->shippingCountry->toBe('GB')
        ->shippingPostcode->toBe('TS1 1ST');
});
