<p align="center">
    <img src="https://raw.githubusercontent.com/Conesso/api-php/develop/art/header.png" alt="Conesso header"/>
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

$client = Conesso::factory()


```