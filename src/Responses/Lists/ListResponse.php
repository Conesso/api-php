<?php

declare(strict_types=1);

namespace Conesso\Responses\Lists;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;

    public function toArray(): array
    {

    }
}
