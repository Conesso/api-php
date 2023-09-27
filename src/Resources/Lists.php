<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\ListsContract;
use Conesso\Resources\Concerns\Transportable;

final class Lists implements ListsContract
{
    use Transportable;
}
