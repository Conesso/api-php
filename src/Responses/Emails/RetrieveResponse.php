<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class RetrieveResponse implements ResponseContract
{
    use ArrayAccessible;

    public int $id;

    public string $uid;

    public string $name;

    public string $description;

    public string $preHeader;

    public string $fromName;

    public string $status;

    public bool $transactional;

    public string $sendingAddress;

    public string $replyToAddress;

    public string $designTool;

    public bool $review;

    public bool $isValid;

    public string $createdAt;

    public string $createdBy;

    public string $updatedAt;

    public string $updatedBy;

    public EmailsSentDetailsResponse $sentDetails;

    public EmailsSplitTestResponse $splitTest;

    public array $tags;

    public array $emailReview;

    public ?string $scheduledAt;

    public ?string $campaign;

    public ?bool $trigger;

    public ?string $sentAt;

    public ?EmailsAudienceResponse $audience;

    public ?EmailsSubjectResponse $subject;

    public ?EmailsBodyResponse $body;

    public function __construct(
        int $id,
        string $uid,
        string $name,
        string $description,
        string $preHeader,
        string $fromName,
        string $status,
        bool $transactional,
        string $sendingAddress,
        string $replyToAddress,
        string $designTool,
        bool $review,
        bool $isValid,
        string $createdAt,
        string $createdBy,
        string $updatedAt,
        string $updatedBy,
        EmailsSentDetailsResponse $sentDetails,
        EmailsSplitTestResponse $splitTest,
        array $tags,
        array $emailReview,
        ?string $scheduledAt,
        ?string $campaign,
        ?bool $trigger,
        ?string $sentAt,
        ?EmailsAudienceResponse $audience,
        ?EmailsSubjectResponse $subject,
        ?EmailsBodyResponse $body
    ) {
        $this->id = $id;
        $this->uid = $uid;
        $this->name = $name;
        $this->description = $description;
        $this->preHeader = $preHeader;
        $this->fromName = $fromName;
        $this->status = $status;
        $this->transactional = $transactional;
        $this->sendingAddress = $sendingAddress;
        $this->replyToAddress = $replyToAddress;
        $this->designTool = $designTool;
        $this->review = $review;
        $this->isValid = $isValid;
        $this->createdAt = $createdAt;
        $this->createdBy = $createdBy;
        $this->updatedAt = $updatedAt;
        $this->updatedBy = $updatedBy;
        $this->sentDetails = $sentDetails;
        $this->splitTest = $splitTest;
        $this->tags = $tags;
        $this->emailReview = $emailReview;
        $this->scheduledAt = $scheduledAt;
        $this->campaign = $campaign;
        $this->trigger = $trigger;
        $this->sentAt = $sentAt;
        $this->audience = $audience;
        $this->subject = $subject;
        $this->body = $body;
    }

    public static function from(array $data): self
    {
        return new self(
            $data['id'],
            $data['uid'],
            $data['name'],
            $data['description'],
            $data['preHeader'],
            $data['fromName'],
            $data['status'],
            $data['transactional'],
            $data['sendingAddress'],
            $data['replyToAddress'],
            $data['designTool'],
            $data['review'],
            $data['isValid'],
            $data['createdAt'],
            $data['createdBy'],
            $data['updatedAt'],
            $data['updatedBy'],
            EmailsSentDetailsResponse::from($data['sentDetails']),
            EmailsSplitTestResponse::from($data['splitTest']),
            $data['tags'],
            $data['emailReview'] ?? [],
            $data['scheduledAt'] ?? null,
            $data['campaign'] ?? null,
            $data['trigger'] ?? null,
            $data['sentAt'] ?? null,
            isset($data['audience']) ? EmailsAudienceResponse::from($data['audience']) : null,
            isset($data['subject']) ? EmailsSubjectResponse::from($data['subject']) : null,
            isset($data['body']) ? EmailsBodyResponse::from($data['body']) : null
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'uid' => $this->uid,
            'name' => $this->name,
            'description' => $this->description,
            'preHeader' => $this->preHeader,
            'fromName' => $this->fromName,
            'status' => $this->status,
            'transactional' => $this->transactional,
            'sendingAddress' => $this->sendingAddress,
            'replyToAddress' => $this->replyToAddress,
            'designTool' => $this->designTool,
            'review' => $this->review,
            'isValid' => $this->isValid,
            'createdAt' => $this->createdAt,
            'createdBy' => $this->createdBy,
            'updatedAt' => $this->updatedAt,
            'updatedBy' => $this->updatedBy,
            'sentDetails' => $this->sentDetails->toArray(),
            'splitTest' => $this->splitTest->toArray(),
            'tags' => $this->tags,
            'emailReview' => $this->emailReview,
            'scheduledAt' => $this->scheduledAt,
            'campaign' => $this->campaign,
            'trigger' => $this->trigger,
            'sentAt' => $this->sentAt,
            'audience' => $this->audience instanceof \Conesso\Responses\Emails\EmailsAudienceResponse ? $this->audience->toArray() : null,
            'subject' => $this->subject instanceof \Conesso\Responses\Emails\EmailsSubjectResponse ? $this->subject->toArray() : null,
            'body' => $this->body instanceof \Conesso\Responses\Emails\EmailsBodyResponse ? $this->body->toArray() : null,
        ];
    }
}
