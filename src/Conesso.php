<?php

declare(strict_types=1);

use Conesso\Client;
use Conesso\Factory;

final class Conesso
{
    public static function client(string $apiKey): Client
    {
        return self::factory()
            ->withApiKey($apiKey)
            ->make();
    }

    public static function factory(): Factory
    {
        return new Factory();
    }
}
