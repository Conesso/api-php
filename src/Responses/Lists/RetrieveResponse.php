<?php

declare(strict_types=1);

namespace Conesso\Responses\Lists;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class RetrieveResponse implements ResponseContract
{
    use ArrayAccessible;

    public int $id;

    public string $name;

    public string $description;

    public bool $isPrivate;

    public bool $optInRequired;

    public int $contactNo;

    public array $tags;

    public string $createdAt;

    public string $createdBy;

    public string $updatedAt;

    public string $updatedBy;

    public string $status;

    public function __construct(
        int $id,
        string $name,
        string $description,
        bool $isPrivate,
        bool $optInRequired,
        int $contactNo,
        array $tags,
        string $createdAt,
        string $createdBy,
        string $updatedAt,
        string $updatedBy,
        string $status
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->isPrivate = $isPrivate;
        $this->optInRequired = $optInRequired;
        $this->contactNo = $contactNo;
        $this->tags = $tags;
        $this->createdAt = $createdAt;
        $this->createdBy = $createdBy;
        $this->updatedAt = $updatedAt;
        $this->updatedBy = $updatedBy;
        $this->status = $status;
    }

    public static function from(array $data, array $metaData = []): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['description'],
            $data['isPrivate'],
            $data['optInRequired'],
            $data['contactNo'],
            $data['tags'],
            $data['createdAt'],
            $data['createdBy'],
            $data['updatedAt'],
            $data['updatedBy'],
            $data['status'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'isPrivate' => $this->isPrivate,
            'optInRequired' => $this->optInRequired,
            'contactNo' => $this->contactNo,
            'tags' => $this->tags,
            'createdAt' => $this->createdAt,
            'createdBy' => $this->createdBy,
            'updatedAt' => $this->updatedAt,
            'updatedBy' => $this->updatedBy,
            'status' => $this->status,
        ];
    }
}
