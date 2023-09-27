<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\CustomFieldsContract;
use Conesso\Resources\Concerns\Transportable;

final class CustomFields implements CustomFieldsContract
{
    use Transportable;
}
