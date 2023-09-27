<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\CartsContract;
use Conesso\Resources\Concerns\Transportable;

final class Carts implements CartsContract
{
    use Transportable;
}
