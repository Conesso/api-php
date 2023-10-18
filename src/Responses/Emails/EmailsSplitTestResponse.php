<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class EmailsSplitTestResponse implements ResponseContract
{
    use ArrayAccessible;

    public bool $active;

    public int $sampleSize;

    public ?string $metric;

    public ?string $type;

    public ?string $winningVariation;

    public ?int $endTime;

    public function __construct(
        bool $active,
        int $sampleSize,
        string $metric = null,
        string $type = null,
        string $winningVariation = null,
        int $endTime = null
    ) {
        $this->active = $active;
        $this->sampleSize = $sampleSize;
        $this->metric = $metric;
        $this->type = $type;
        $this->winningVariation = $winningVariation;
        $this->endTime = $endTime;
    }

    public static function from(array $data): self
    {
        return new self(
            $data['active'],
            $data['sampleSize'],
            $data['metric'],
            $data['type'],
            $data['winningVariation'],
            $data['endTime'],
        );
    }

    public function toArray(): array
    {
        return [
            'active' => $this->active,
            'sampleSize' => $this->sampleSize,
            'metric' => $this->metric,
            'type' => $this->type,
            'winningVariation' => $this->winningVariation,
            'endTime' => $this->endTime,
        ];
    }
}
