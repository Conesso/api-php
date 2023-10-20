<?php

declare(strict_types=1);

namespace Conesso\Responses\Segments;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class CreateResponse implements ResponseContract
{
    use ArrayAccessible;

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }
}
