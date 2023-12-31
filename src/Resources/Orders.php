<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\OrdersContract;
use Conesso\Resources\Concerns\Transportable;

final class Orders implements OrdersContract
{
    use Transportable;
}
