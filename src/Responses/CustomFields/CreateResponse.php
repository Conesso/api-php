<?php

declare(strict_types=1);

namespace Conesso\Responses\CustomFields;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class CreateResponse implements ResponseContract
{
    use ArrayAccessible;

    public int $id;

    public string $name;

    public string $dataType;

    public string $nameKey;

    public string $description;

    public string $defaultValue;

    public bool $isPrivate;

    public string $createdAt;

    public string $createdBy;

    public string $updatedAt;

    public string $updatedBy;

    public function __construct(
        int $id,
        string $name,
        string $dataType,
        string $nameKey,
        string $description,
        string $defaultValue,
        bool $isPrivate,
        string $createdAt,
        string $createdBy,
        string $updatedAt,
        string $updatedBy
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->dataType = $dataType;
        $this->nameKey = $nameKey;
        $this->description = $description;
        $this->defaultValue = $defaultValue;
        $this->isPrivate = $isPrivate;
        $this->createdAt = $createdAt;
        $this->createdBy = $createdBy;
        $this->updatedAt = $updatedAt;
        $this->updatedBy = $updatedBy;
    }

    public static function from(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['dataType'],
            $data['nameKey'],
            $data['description'],
            $data['defaultValue'],
            $data['isPrivate'],
            $data['createdAt'],
            $data['createdBy'],
            $data['updatedAt'],
            $data['updatedBy'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'dataType' => $this->dataType,
            'nameKey' => $this->nameKey,
            'description' => $this->description,
            'defaultValue' => $this->defaultValue,
            'isPrivate' => $this->isPrivate,
            'createdAt' => $this->createdAt,
            'createdBy' => $this->createdBy,
            'updatedAt' => $this->updatedAt,
            'updatedBy' => $this->updatedBy,
        ];
    }
}
