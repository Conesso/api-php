<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class EmailsBodyResponse implements ResponseContract
{
    use ArrayAccessible;

    public string $activeVariation;

    /**
     * @var EmailsBodyVariationResponse[]
     */
    public array $variations;

    public EmailsBodyCurrentVersionResponse $currentVersion;

    public function __construct(
        string $activeVariation,
        array $variations,
        EmailsBodyCurrentVersionResponse $currentVersion
    ) {
        $this->activeVariation = $activeVariation;
        $this->variations = $variations;
        $this->currentVersion = $currentVersion;
    }

    public static function from(array $data): self
    {
        $variations = array_map(fn (array $variation): EmailsBodyVariationResponse => EmailsBodyVariationResponse::from(
            $variation
        ), $data['variations']);

        return new self(
            $data['activeVariation'],
            $variations,
            EmailsBodyCurrentVersionResponse::from($data['currentVersion'])
        );
    }

    public function toArray(): array
    {
        return [
            'activeVariation' => $this->activeVariation,
            'variations' => array_map(fn (EmailsBodyVariationResponse $variation): array => $variation->toArray(), $this->variations),
            'currentVersion' => $this->currentVersion->toArray(),
        ];
    }
}
