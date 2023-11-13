<p align="center">
    <img src="https://raw.githubusercontent.com/Conesso/api-php/develop/art/header.png" alt="Conesso header"/>
</p>

---

<p align="center">

![Static Badge](https://img.shields.io/badge/CONESSO-blue?style=for-the-badge&logoColor=%23173E58&link=https%3A%2F%2Fwww.conesso.io%2F)

![GitHub Workflow Status (with event)](https://img.shields.io/github/actions/workflow/status/conesso/api-php/tests.yml?style=for-the-badge&link=https%3A%2F%2Fgithub.com%2FConesso%2Fapi-php%2Factions%2Fworkflows%2Ftests.yml)

![Packagist Version (custom server)](https://img.shields.io/packagist/v/conesso/client?style=for-the-badge&link=https%3A%2F%2Fpackagist.org%2Fpackages%2Fconesso%2Fclient)

![Packagist Downloads (custom server)](https://img.shields.io/packagist/dt/conesso/client?style=for-the-badge&link=https%3A%2F%2Fpackagist.org%2Fpackages%2Fconesso%2Fclient%2Fstats)

</p>

# Getting started

```bash
composer require conesso/client
```

This library is designed to use any PSR-18 client already integrated into your project. Ensure that the `php-http/discovery` composer plugin is allowed to run or install a client of your choice manually.

Guzzle is a well known and widely used PSR-18 HTTP client package.

```bash
composer require guzzlehttp/guzzle
```

## Create your configured API client.

```php
use Conesso\Conesso;

$apiKey = '9gba262882g87f3b31e4f843adf3d66f19d322d6d7673b19c3e61f6f07abf2a5';

$client = Conesso::client($apiKey);

```

If you require more control over the HTTP client is it possible to create and configure your own.

```php
<?php

$apiKey = '9gba262882g87f3b31e4f843adf3d66f19d322d6d7673b19c3e61f6f07abf2a5';

$httpClient = new GuzzleHttp\Client();

$client = Conesso::factory()
    ->withApiKey($apiKey)
    ->withHttpHeader('User-Agent', 'MyApp/1.0')
    ->withBaseUri('https://sandbox.conesso.io')
    ->withHttpClient($httpClient)
    ->make();
```

## Usage

### Carts Resource `/v2/carts` (📕 [API Documentation](https://docs.conesso.io/#carts))

#### List Carts

```php
<?php

$carts = $conesso->carts()->list([
    'count' => 10,
    'page' => 1,
    'filter' => 'John',
    'searchKey' => 'customerFirstname',
]);

foreach ($carts as $cart) {
    echo $cart->id . PHP_EOL; // 1
    echo $cart->customerFirstname . PHP_EOL; // John
}
```

#### Retrieve a cart

```php
<?php

$cart = $conesso->carts()->retrieve('1f6ef9fcd71g732c61bf03d5fabc2034');

echo $cart->id . PHP_EOL; // 1f6ef9fcd71g732c61bf03d5fabc2034
echo $cart->customerEmail . PHP_EOL; // john.doe@example
echo $cart->customerFirstname . PHP_EOL; // John
echo $cart->customerLastname . PHP_EOL; // Doe

foreach ($cart->cartProducts as $product) {
    echo $product->sku . PHP_EOL; // 123456
    echo $product->name . PHP_EOL; // Product 1
}
```

#### Create Cart
```php
<?php


$cartData = [
    'customerEmail' => 'john.doe@example.com',
    'apiReferenceId' => '123456789',
    'customerIsGuest'=> true,
    'cartProducts' => [
        [
            'name' => 'Product 1',
            'sku' => '123456789',
            'price' => 100,
            'quantity' => 1,
        ]
    ]
];

$cart = $conesso->carts()->create($cartData);

echo $cart->id . PHP_EOL; // 1f6ef9fcd71g732c61bf03d5fabc2034
echo $cart->createdAt; // 2020-10-30T09:00:00+00:00
```

#### Update Cart
```php
$cartData = [
    'customerEmail' => 'john.doe+updated@example.com',
];

$cart = $conesso->carts()->update('1f6ef9fcd71g732c61bf03d5fabc2034', $cartData);

echo $cart->customEmail . PHP_EOL; // john.doe+updated@example.com
```

#### Delete Cart
```php
<?php

$deleted = $conesso->carts()->delete('1f6ef9fcd71g732c61bf03d5fabc2034');

echo $deleted->id; . PHP_EOL; // 1f6ef9fcd71g732c61bf03d5fabc2034
echo $deleted->deleted; . PHP_EOL; // true
```

---

### Contact Custom Field `/v2/custom-fields` (📕 [API Documentation](https://api.conesso.io/v2/docs/#/Contact%20Custom%20Field))

#### List Contact custom Fields
```php
<?php

$customFields = $conesso->customFields()->list([
    'count' => 10,
    'page' => 1
]);

foreach ($customFields->data as $customField) {
    echo $customField->id . PHP_EOL; // 1
    echo $customField->name . PHP_EOL; // Custom Field 1
    echo $customField->isPrivate . PHP_EOL; // false
}

```

#### Retrieve a Contact custom Field
```php
<?php

$customField = $conesso->customFields()->retrieve(1);

echo $customField->id . PHP_EOL; // 1
echo $customField->name . PHP_EOL; // Custom Field 1
echo $customField->isPrivate . PHP_EOL; // false
```

#### Create Contact custom Field
```php
<?php

$customFieldData = [
    'name' => 'Custom Field 1',
    'dataType' => 'string',
    'nameKey' => 'custom_field_1',
    'description' => 'Custom Field 1 Description',
    'defaultValue' => 'Custom Field 1 Default Value',
    'isPrivate' => false,
    'createdAt' => '2023-06-20T09:14:15.000Z',
    'createdBy' => 'Test User',
    'updatedAt' => '2023-06-20T09:14:15.000Z',
    'updatedBy' => 'Test User',
];

$created = $conesso->customFields()->create($customFieldData);

echo $created->id . PHP_EOL; // 1
echo $created->name . PHP_EOL; // Custom Field 1

```

#### Update Contact custom Field
```php
<?php

$customFieldData = [
    'name' => 'Custom Field 1 Updated',
];

$updated = $conesso->customFields()->update(1, $customFieldData);

echo $updated->id . PHP_EOL; // 1
echo $updated->name . PHP_EOL; // Custom Field 1 Updated
```

#### Delete Contact custom Field
```php
<?php

$deleted = $conesso->customFields()->delete(1);

echo $deleted->id . PHP_EOL; // 1
echo $deleted->deleted . PHP_EOL; // true
```

---
