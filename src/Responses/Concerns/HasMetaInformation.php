<?php

declare(strict_types=1);

namespace Conesso\Responses\Concerns;

use Conesso\Responses\Meta\MetaInformation;

trait HasMetaInformation
{
    public function meta(): MetaInformation
    {
        return $this->meta;
    }
}
