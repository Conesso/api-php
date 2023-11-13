<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;
use Conesso\Responses\Meta\MetaInformation;

final class RetrieveContentResponse implements ResponseContract
{
    use ArrayAccessible;

    public array $variations;

    public MetaInformation $meta;

    public function __construct(
        array $variations,
        MetaInformation $meta
    ) {
        $this->variations = $variations;
        $this->meta = $meta;
    }

    public static function from(array $data, ?MetaInformation $meta): self
    {
        $variations = array_map(static fn ($item): \Conesso\Responses\Emails\EmailVariationVersionResponse => EmailVariationVersionResponse::from($item), $data);

        return new self($variations, $meta);
    }

    public function toArray(): array
    {
        return [
            'variations' => array_map(static fn ($item) => $item->toArray(), $this->variations),
            'meta' => $this->meta,
        ];
    }
}
