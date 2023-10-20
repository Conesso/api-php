<?php

declare(strict_types=1);

namespace Conesso\Responses\Segments;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class RetrieveResponse implements ResponseContract
{
    use ArrayAccessible;

    public int $id;

    public string $name;

    public string $uid;

    public string $description;

    public int $autoRefresh;

    public int $contactNo;

    public string $refreshStatus;

    public string $refreshDate;

    public string $createdAt;

    public string $createdBy;

    public string $updatedAt;

    public string $updatedBy;

    public string $status;

    public array $tags;

    public SegmentConditionResponse $condition;

    public function __construct(
        int $id,
        string $name,
        string $uid,
        string $description,
        int $autoRefresh,
        int $contactNo,
        string $refreshStatus,
        string $refreshDate,
        string $createdAt,
        string $createdBy,
        string $updatedAt,
        string $updatedBy,
        string $status,
        array $tags,
        SegmentConditionResponse $condition
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->uid = $uid;
        $this->description = $description;
        $this->autoRefresh = $autoRefresh;
        $this->contactNo = $contactNo;
        $this->refreshStatus = $refreshStatus;
        $this->refreshDate = $refreshDate;
        $this->createdAt = $createdAt;
        $this->createdBy = $createdBy;
        $this->updatedAt = $updatedAt;
        $this->updatedBy = $updatedBy;
        $this->status = $status;
        $this->tags = $tags;
        $this->condition = $condition;
    }

    public static function from(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['uid'],
            $data['description'],
            $data['autoRefresh'],
            $data['contactNo'],
            $data['refreshStatus'],
            $data['refreshDate'],
            $data['createdAt'],
            $data['createdBy'],
            $data['updatedAt'],
            $data['updatedBy'],
            $data['status'],
            $data['tags'],
            SegmentConditionResponse::from($data['condition'])
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'uid' => $this->uid,
            'description' => $this->description,
            'autoRefresh' => $this->autoRefresh,
            'contactNo' => $this->contactNo,
            'refreshStatus' => $this->refreshStatus,
            'refreshDate' => $this->refreshDate,
            'createdAt' => $this->createdAt,
            'createdBy' => $this->createdBy,
            'updatedAt' => $this->updatedAt,
            'updatedBy' => $this->updatedBy,
            'status' => $this->status,
            'tags' => $this->tags,
            'conditions' => $this->condition->toArray(),
        ];
    }
}
