<?php

declare(strict_types=1);

namespace Conesso\Responses\Segments;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class UpdateResponse implements ResponseContract
{
    use ArrayAccessible;


    public RetrieveResponse $segment;

    public function __construct(RetrieveResponse $segment)
    {
        $this->segment = $segment;
    }

    public static function from(array $data): self
    {
        return new self(RetrieveResponse::from($data));
    }

    public function toArray(): array
    {
        return [
            'segment' => $this->segment->toArray(),
        ];
    }
}
