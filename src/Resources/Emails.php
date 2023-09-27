<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\EmailsContract;
use Conesso\Resources\Concerns\Transportable;

final class Emails implements EmailsContract
{
    use Transportable;
}
