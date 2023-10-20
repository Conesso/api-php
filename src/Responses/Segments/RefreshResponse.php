<?php

declare(strict_types=1);

namespace Conesso\Responses\Segments;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class RefreshResponse implements ResponseContract
{
    use ArrayAccessible;


    
    public static function from(array $data): self
    {

    }

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }
}
