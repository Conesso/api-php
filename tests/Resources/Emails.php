<?php

use Conesso\Responses\Emails\CreateResponse;
use Conesso\Responses\Emails\DeleteResponse;
use Conesso\Responses\Emails\EmailVariationVersionResponse;
use Conesso\Responses\Emails\ListResponse;
use Conesso\Responses\Emails\MergeTagsResponse;
use Conesso\Responses\Emails\RetrieveContentResponse;
use Conesso\Responses\Emails\RetrieveResponse;
use Conesso\Responses\Emails\TestResponse;
use Conesso\Responses\Emails\TestWithListResponse;
use Conesso\Responses\Emails\TriggerResponse;
use Conesso\Responses\Emails\UpdateResponse;
use Conesso\Responses\Emails\UrlResponse;
use Conesso\ValueObjects\Transporter\Response;

test('list', function () {
    $client = mockConessoClient('GET', 'emails', [], Response::from(emailListResource(), metaResource()));

    $result = $client->emails()->list();

    expect($result)->toBeInstanceOf(ListResponse::class)
        ->emails->toBeArray()
        ->emails->each->toBeInstanceOf(RetrieveResponse::class);
});

test('create', function () {
    $client = mockConessoClient('POST', 'emails', [], Response::from(emailResource()));

    $result = $client->emails()->create([]);

    expect($result)->toBeInstanceOf(CreateResponse::class)
        ->email->toBeInstanceOf(RetrieveResponse::class);
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

test('update', function () {
    $client = mockConessoClient('PUT', 'emails/1', [], Response::from(emailResource()));

    $response = $client->emails()->update(1, []);

    expect($response)->toBeInstanceOf(UpdateResponse::class)
        ->email->toBeInstanceOf(RetrieveResponse::class);
});

test('delete', function () {
    $client = mockConessoClient('DELETE', 'emails/1', [], Response::from(['id' => 1, 'deleted' => true]));

    $response = $client->emails()->delete(1);

    expect($response)->toBeInstanceOf(DeleteResponse::class)
        ->id->toBe(1)
        ->deleted->toBeTrue();
});

test('retrieve urls', function () {
    $client = mockConessoClient(
        'GET',
        'emails/url/1',
        [],
        Response::from(emailUrlsResource())
    );

    $response = $client->emails()->urls(1);

    expect($response)->toBeInstanceOf(UrlResponse::class)
        ->urls->toBeArray()
        ->urls->toBe(emailUrlsResource());
});

test('trigger', function () {
    $client = mockConessoClient('PUT', 'emails/1/trigger', [], Response::from(['id' => 1, 'success' => true]));

    $response = $client->emails()->trigger(1);

    expect($response)->toBeInstanceOf(TriggerResponse::class);
});

test('test', function () {
    $client = mockConessoClient(
        'POST',
        'emails/1/test',
        [],
        Response::from(['id' => 1, 'success' => true])
    );

    $response = $client->emails()->test(1);

    expect($response)->toBeInstanceOf(TestResponse::class);
});

test('test list', function () {
    $client = mockConessoClient(
        'POST',
        'emails/1/test/1',
        [],
        Response::from(['id' => 1, 'listId' => 1, 'success' => true])
    );

    $response = $client->emails()->testList(1, 1);

    expect($response)->toBeInstanceOf(TestWithListResponse::class)
        ->id->toBe(1)
        ->listId->toBe(1)
        ->success->toBeTrue();
});

test('merge urls', function () {
    $client = mockConessoClient(
        'POST',
        'emails/mergetags/1',
        [],
        Response::from(emailsMergeTagsResource())
    );

    $response = $client->emails()->mergeTags(1);

    expect($response)->toBeInstanceOf(MergeTagsResponse::class)
        ->id->toBe(1)
        ->mergedTags->toBeArray()->toBeEmpty();
});

test('retrieve variation versions', function () {
    $client = mockConessoClient(
        'GET',
        'emails/1/variations/4/versions',
        [],
        Response::from(emailContentVariationListResource(), metaResource())
    );

    $response = $client->emails()->retrieveContent(1, 4);

    expect($response)->toBeInstanceOf(RetrieveContentResponse::class)
        ->variations->toBeArray()
        ->variations->each->toBeInstanceOf(EmailVariationVersionResponse::class);
});
