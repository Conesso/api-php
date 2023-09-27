<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\ProductsContract;
use Conesso\Resources\Concerns\Transportable;

final class Products implements ProductsContract
{
    use Transportable;
}
