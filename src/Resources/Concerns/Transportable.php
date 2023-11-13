<?php

declare(strict_types=1);

namespace Conesso\Resources\Concerns;

use Conesso\Contracts\TransporterContract;

trait Transportable
{
    private TransporterContract $transporter;

    public function __construct(TransporterContract $transporter)
    {
        $this->transporter = $transporter;
    }
}
