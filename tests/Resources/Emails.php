<?php

use Conesso\Responses\Emails\ListResponse;
use Conesso\Responses\Emails\RetrieveResponse;
use Conesso\ValueObjects\Transporter\Response;

test('list', function () {
    $client = mockConessoClient('GET', 'emails', [], Response::from(emailListResource(), metaResource()));

    $result = $client->emails()->list();

    expect($result)->toBeInstanceOf(ListResponse::class)
        ->emails->toBeArray()
        ->emails->each->toBeInstanceOf(RetrieveResponse::class);

});

test('retrieve', function () {
    $client = mockConessoClient('GET', 'emails/1', [], Response::from(emailResource()));

    $result = $client->emails()->retrieve(1);

    expect($result)->toBeInstanceOf(RetrieveResponse::class)
        ->id->toBe(4)
        ->uid->toBe('b6c3c634d')
        ->name->toBe('Order Confirmation')
        ->campaign->toBe('')
        ->status->toBe('failed')
        ->description->toBe('')
        ->trigger->toBeFalse()
        ->review->toBeFalse()
        ->transactional->toBeFalse()
        ->fromName->toBe('Conesso')
        ->sendingAddress->toBe('conesso@qa-emails.conesso-demo.com')
        ->replyToAddress->toBe('conessno@gmail.com')
        ->designTool->toBe('studio')
        ->scheduledAt->toBe('2023-08-31T04:16:00.000Z')
        ->sentAt->toBe('2023-08-31T04:38:31.000Z')
        ->createdAt->toBe('2023-08-31T04:04:43.000Z')
        ->createdBy->toBe('Adam Paterson')
        ->updatedAt->toBe('2023-08-31T04:38:31.000Z')
        ->updatedBy->toBe('Adam Paterson')
        ->isValid->toBe(true)
        ->preHeader->toBe('')
        ->sentDetails->toBeInstanceOf(\Conesso\Responses\Emails\EmailsSentDetailsResponse::class)
        ->splitTest->toBeInstanceOf(\Conesso\Responses\Emails\EmailsSplitTestResponse::class)
        ->audience->toBeInstanceOf(\Conesso\Responses\Emails\EmailsAudienceResponse::class)
        ->tags->toBeArray()->toBeEmpty()
        ->subject->toBeInstanceOf(\Conesso\Responses\Emails\EmailsSubjectResponse::class)
        ->body->toBeInstanceOf(\Conesso\Responses\Emails\EmailsBodyResponse::class)
        ->emailReview->toBeArray()->toBeEmpty();
});
