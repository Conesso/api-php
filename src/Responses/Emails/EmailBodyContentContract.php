<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;

interface EmailBodyContentContract extends ResponseContract
{
    public function getContent(): string;
}
