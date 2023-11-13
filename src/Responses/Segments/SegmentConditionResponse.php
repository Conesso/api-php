<?php

declare(strict_types=1);

namespace Conesso\Responses\Segments;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class SegmentConditionResponse implements ResponseContract
{
    use ArrayAccessible;

    public string $type;

    public string $target;

    public string $operator;

    public string $value1;

    public string $value2;

    public array $conditions;

    public function __construct(
        string $type,
        string $target,
        string $operator,
        string $value1,
        string $value2,
        array $conditions
    ) {
        $this->type = $type;
        $this->target = $target;
        $this->operator = $operator;
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->conditions = $conditions;
    }

    public static function from(array $data): self
    {
        return new self(
            $data['type'],
            $data['target'],
            $data['operator'],
            $data['value1'],
            $data['value2'],
            $data['conditions']
        );
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'target' => $this->target,
            'operator' => $this->operator,
            'value1' => $this->value1,
            'value2' => $this->value2,
            'conditions' => $this->conditions,
        ];
    }
}
