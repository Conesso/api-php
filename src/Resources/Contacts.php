<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\ContactsContract;
use Conesso\Resources\Concerns\Transportable;

final class Contacts implements ContactsContract
{
    use Transportable;
}
