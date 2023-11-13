<?php

declare(strict_types=1);

namespace Conesso\Contracts;

interface CreateFromStringContract
{
    public static function from(string $value): self;
}
