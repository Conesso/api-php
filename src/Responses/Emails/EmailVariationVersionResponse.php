<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class EmailVariationVersionResponse implements ResponseContract
{
    use ArrayAccessible;

    public int $versionId;

    public string $versionUid;

    public string $updatedAt;

    public string $createdAt;

    public string $updatedBy;

    public string $createdBy;

    public EmailBodyContentContract $content;

    public ?string $txtContent;

    public function __construct(
        int $versionId,
        string $versionUid,
        string $updatedAt,
        string $createdAt,
        string $updatedBy,
        string $createdBy,
        EmailBodyContentContract $content,
        ?string $txtContent
    ) {
        $this->versionId = $versionId;
        $this->versionUid = $versionUid;
        $this->updatedAt = $updatedAt;
        $this->createdAt = $createdAt;
        $this->updatedBy = $updatedBy;
        $this->createdBy = $createdBy;
        $this->content = $content;
        $this->txtContent = $txtContent;
    }

    public static function from(array $data): self
    {
        return new self(
            $data['versionId'],
            $data['versionUid'],
            $data['updatedAt'],
            $data['createdAt'],
            $data['updatedBy'],
            $data['createdBy'],
            EmailsBodyContentResponse::from($data['content']),
            $data['txtContent']
        );
    }

    public function toArray(): array
    {
        return [
            'versionId' => $this->versionId,
            'versionUid' => $this->versionUid,
            'updatedAt' => $this->updatedAt,
            'createdAt' => $this->createdAt,
            'updatedBy' => $this->updatedBy,
            'createdBy' => $this->createdBy,
            'content' => $this->content->toArray(),
            'txtContent' => $this->txtContent,
        ];
    }
}
