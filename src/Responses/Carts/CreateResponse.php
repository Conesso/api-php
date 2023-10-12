<?php

declare(strict_types=1);

namespace Conesso\Responses\Carts;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

class CreateResponse implements ResponseContract
{
    use ArrayAccessible;

    public static function from(array $data)
    {

    }

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }
}
