<p align="center">
    <img src="https://raw.githubusercontent.com/Conesso/api-php/develop/art/header.png" width="600" alt="Conesso header"/>

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
<?php

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