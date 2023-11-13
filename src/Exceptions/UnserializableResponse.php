<?php

declare(strict_types=1);

namespace Conesso\Exceptions;

use Exception;
use JsonException;

final class UnserializableResponse extends Exception
{
    public function __construct(JsonException $exception)
    {
        parent::__construct($exception->getMessage(), 0, $exception);
    }
}
