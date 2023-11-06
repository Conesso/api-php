<?php

use Conesso\Responses\Segments\CreateResponse;
use Conesso\Responses\Segments\DeleteResponse;
use Conesso\Responses\Segments\ListResponse;
use Conesso\Responses\Segments\RefreshResponse;
use Conesso\Responses\Segments\RetrieveResponse;
use Conesso\Responses\Segments\SegmentConditionResponse;
use Conesso\Responses\Segments\UpdateResponse;
use Conesso\ValueObjects\Transporter\Response;

test('retrieve', function () {
    $client = mockConessoClient(
        'GET',
        'segments/1',
        [],
        Response::from(segmentResource())
    );

    $response = $client->segments()->retrieve(1);

    expect($response)->toBeInstanceOf(RetrieveResponse::class)
        ->id->toBe(1)
        ->name->toBe('Segment 1')
        ->uid->toBe('sdfwers')
        ->description->toBe('Segment 1 description')
        ->autoRefresh->toBe(0)
        ->contactNo->toBe(03423423423)
        ->refreshStatus->toBe('pending')
        ->refreshDate->toBe('2020-01-01')
        ->createdAt->toBe('2020-01-01')
        ->createdBy->toBe('John Doe')
        ->updatedAt->toBe('2020-01-01')
        ->updatedBy->toBe('John Doe')
        ->status->toBe('active')
        ->tags->toBeArray()
        ->condition->toBeInstanceOf(SegmentConditionResponse::class);
});

test('list', function () {
    $client = mockConessoClient(
        'GET',
        'segments',
        [],
        Response::from(segmentListResource(), metaResource())
    );

    $response = $client->segments()->list();

    expect($response)->toBeInstanceOf(ListResponse::class)
        ->segments->toBeArray()
        ->segments->each->toBeInstanceOf(RetrieveResponse::class);
});

test('create', function () {
    $client = mockConessoClient(
        'POST',
        'segments',
        [],
        Response::from(segmentResource())
    );

    $response = $client->segments()->create([]);

    expect($response)->toBeInstanceOf(CreateResponse::class)
        ->segment->toBeInstanceOf(RetrieveResponse::class);
});

test('update', function () {
    $client = mockConessoClient('PUT', 'segments/1', [], Response::from(segmentResource()));

    $response = $client->segments()->update(1, []);

    expect($response)->toBeInstanceOf(UpdateResponse::class)
        ->segment->toBeInstanceOf(RetrieveResponse::class);
});

test('delete', function () {
    $client = mockConessoClient('DELETE', 'segments/1', [], Response::from(['id' => 1, 'deleted' => true]));

    $response = $client->segments()->delete(1);

    expect($response)->toBeInstanceOf(DeleteResponse::class)
        ->id->toBe(1)
        ->deleted->toBeTrue();
});

test('refresh', function () {
    $client = mockConessoClient(
        'PUT',
        'segments/1/refresh',
        [],
        Response::from(['id' => 1, 'success' => true])
    );

    $response = $client->segments()->refresh(1);

    expect($response)->toBeInstanceOf(RefreshResponse::class)
        ->id->toBe(1)
        ->success->toBeTrue();
});
