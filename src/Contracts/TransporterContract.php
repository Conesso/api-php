<?php

declare(strict_types=1);

namespace Conesso\Contracts;

use Conesso\ValueObjects\Transporter\Payload;
use Conesso\ValueObjects\Transporter\Response;

interface TransporterContract
{
    public function requestObject(Payload $payload): Response;
}
