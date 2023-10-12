<?php

function cartResource(): array
{
    return [
        'id' => '1f6ef9fcd71f732c60af03d5fabc2033',
        'contactId' => 26,
        'orderId' => null,
        'apiIntegration' => 'conesso-api-client',
        'apiResource' => 'carts',
        'apiReferenceId' => '870211',
        'createdAt' => '2023-08-23T08:35:02.000Z',
        'updatedAt' => '2023-08-23T08:35:02.000Z',
        'cartCreatedAt' => '2023-08-22T14:26:51.000Z',
        'cartUpdatedAt' => '2023-08-22T14:26:59.000Z',
        'confirmedIsAbandoned' => true,
        'dateConfirmedIsAbandoned' => '2023-08-23T08:35:02.000Z',
        'recoverCartUrl' => null,
        'externalOrderId' => null,
        'isActive' => 'false',
        'total' => 5000,
        'totalIncTax' => 6000,
        'isoCurrencyCode' => 'GBP',
        'numberOfProducts' => 1,
        'abandonedTotal' => 6000,
        'abandonedTotalWithDiscount' => 6000,
        'abandonedTotalDiscount' => 0,
        'customerEmail' => 'adam.paterson@conesso.io',
        'customerFirstname' => null,
        'customerLastname' => null,
        'customerGender' => '',
        'customerTelephone' => '+443839484958',
        'customerMobile' => '',
        'customerDob' => null,
        'customerIsGuest' => 1,
        'customerNotes' => '',
        'billingFirstname' => 'Adam',
        'billingLastname' => 'Paterson',
        'billingAddress1' => '123 Test Road',
        'billingAddress2' => 'Testing Lane',
        'billingCity' => 'TestVille',
        'billingCounty' => 'TestingShire',
        'billingPostcode' => 'TS1 1ST',
        'billingCountry' => 'GB',
        'shippingFirstname' => 'Adam',
        'shippingLastname' => 'Paterson',
        'shippingAddress1' => '123 Test Road',
        'shippingAddress2' => 'Testing Lane',
        'shippingCity' => 'TestVille',
        'shippingCounty' => 'TestingShire',
        'shippingCountry' => 'GB',
        'shippingPostcode' => 'TS1 1ST',
        'cartProducts' => [
            cartItemResource(),
            cartItemResource(),
        ],
        'customFields' => [
        ],
    ];
}

function cartItemResource(): array
{
    return [
        'cartId' => '1f6ef9fcd71f732c60af03d5fabc2033',
        'productId' => '0efa35db2574029e8c9c870d39f72cbe',
        'cartLineId' => '123456',
        'productSku' => 'test-sku',
        'productName' => 'Test Product',
        'productDescription' => 'Test Product Description',
        'taxPercent' => 20,
        'productPriceTax' => 2.50,
        'productOriginalPrice' => 30.00,
        'productPrice' => 20,
        'productPriceIncTax' => 22.50,
        'rowTotal' => 40,
        'rowTotalIncTax' => 45,
        'abandonedRowTotal' => 40,
        'abandonedRowTotalWithDiscount' => 40,
        'abandonedRowTotalDiscount' => 0,
        'quantity' => 2,
    ];
}

function cartsListResource(): array
{
    return [
        cartResource(),
        cartResource(),
    ];
}
