<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\SegmentsContract;
use Conesso\Resources\Concerns\Transportable;

final class Segments implements SegmentsContract
{
    use Transportable;
}
