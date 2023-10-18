<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class EmailsSubjectResponse implements ResponseContract
{
    use ArrayAccessible;

    public string $activeVariation;

    public array $variations;

    public function __construct(
        string $activeVariation,
        array $variations
    ) {
        $this->activeVariation = $activeVariation;
        $this->variations = $variations;
    }

    public static function from(array $data): self
    {
        $variations = array_map(fn (array $variation): EmailsBodyVersionResponse => EmailsBodyVersionResponse::from(
            $variation
        ), $data['variations']);

        return new self(
            $data['activeVariation'],
            $variations
        );
    }

    public function toArray(): array
    {
        return [
            'active_variation' => $this->activeVariation,
            'variations' => array_map(fn (EmailsBodyVersionResponse $variation): array => $variation->toArray(), $this->variations),
        ];
    }
}
