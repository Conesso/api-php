<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class RetrieveResponse implements ResponseContract
{
    use ArrayAccessible;

    private int $id;

    private string $name;

    private string $preHeader;

    private string $fromName;

    private string $status;

    private string $sendingAddress;

    private string $designTool;

    private string $scheduledAt;

    private string $uid;

    private string $campaign;

    private string $description;

    private string $trigger;

    private string $review;

    private bool $transactional;

    private string $replyToAddress;

    private string $sentAt;

    private string $createdAt;

    private string $createdBy;

    private string $updatedAt;

    private string $updatedBy;

    private string $isValid;

    private EmailsSentDetailsResponse $sentDetails;

    private EmailsSplitTestResponse $splitTest;

    private EmailsAudienceResponse $audience;

    private array $tags;

    private EmailsSubjectResponse $subject;

    private EmailsBodyResponse $body;

    private array $emailReview;

    public function __construct(
        int $id,
        string $name,
        string $preHeader,
        string $fromName,
        string $status,
        string $sendingAddress,
        string $designTool,
        string $scheduledAt,
        string $uid,
        string $campaign,
        string $description,
        string $trigger,
        string $review,
        bool $transactional,
        string $replyToAddress,
        string $sentAt,
        string $createdAt,
        string $createdBy,
        string $updatedAt,
        string $updatedBy,
        string $isValid,
        EmailsSentDetailsResponse $sentDetails,
        EmailsSplitTestResponse $splitTest,
        EmailsAudienceResponse $audience,
        array $tags,
        EmailsSubjectResponse $subject,
        EmailsBodyResponse $body,
        array $emailReview
    ) {

        $this->id = $id;
        $this->name = $name;
        $this->preHeader = $preHeader;
        $this->fromName = $fromName;
        $this->status = $status;
        $this->sendingAddress = $sendingAddress;
        $this->designTool = $designTool;
        $this->scheduledAt = $scheduledAt;
        $this->uid = $uid;
        $this->campaign = $campaign;
        $this->description = $description;
        $this->trigger = $trigger;
        $this->review = $review;
        $this->transactional = $transactional;
        $this->replyToAddress = $replyToAddress;
        $this->sentAt = $sentAt;
        $this->createdAt = $createdAt;
        $this->createdBy = $createdBy;
        $this->updatedAt = $updatedAt;
        $this->updatedBy = $updatedBy;
        $this->isValid = $isValid;
        $this->sentDetails = $sentDetails;
        $this->splitTest = $splitTest;
        $this->audience = $audience;
        $this->tags = $tags;
        $this->subject = $subject;
        $this->body = $body;
        $this->emailReview = $emailReview;
    }

    public static function from(array $data): self
    {
        var_dump($data['body']);

        return new self(
            $data['id'],
            $data['name'],
            $data['preHeader'],
            $data['fromName'],
            $data['status'],
            $data['sendingAddress'],
            $data['designTool'],
            $data['scheduledAt'],
            $data['uid'],
            $data['campaign'],
            $data['description'],
            $data['trigger'],
            $data['review'],
            $data['transactional'],
            $data['replyToAddress'],
            $data['sentAt'],
            $data['createdAt'],
            $data['createdBy'],
            $data['updatedAt'],
            $data['updatedBy'],
            $data['isValid'],
            EmailsSentDetailsResponse::from($data['sentDetails']),
            EmailsSplitTestResponse::from($data['splitTest']),
            EmailsAudienceResponse::from($data['audience']),
            $data['tags'],
            EmailsSubjectResponse::from($data['subject']),
            EmailsBodyResponse::from($data['body']),
            $data['emailReview']
        );
    }

    public function toArray(): array
    {
        return [

        ];
    }
}
