<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\EcommerceContract;
use Conesso\Resources\Concerns\Transportable;

final class Ecommerce implements EcommerceContract
{
    use Transportable;
}
