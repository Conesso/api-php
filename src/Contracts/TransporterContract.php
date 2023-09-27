<?php

declare(strict_types=1);

namespace Conesso\Contracts;

interface TransporterContract
{
    public function requestObject(): mixed;
}
