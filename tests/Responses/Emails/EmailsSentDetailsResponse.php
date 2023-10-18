<?php

use Conesso\Responses\Emails\EmailsSentDetailsResponse;

test('from', function () {
    $response = EmailsSentDetailsResponse::from(emailSentResource());

    expect($response)->toBeInstanceOf(EmailsSentDetailsResponse::class)
        ->totalContacts->toBe(12)
        ->deliveredToCount->toBe(8)
        ->bouncedCount->toBe(1)
        ->droppedCount->toBe(1)
        ->totalOpens->toBe(2)
        ->totalUniqueOpens->toBe(2)
        ->totalClickThroughs->toBe(1)
        ->totalUniqueClickThroughs->toBe(1)
        ->unsubscribeCount->toBe(1)
        ->complaintsCount->toBe(1);
});

test('to array', function () {
    $response = EmailsSentDetailsResponse::from(emailSentResource());

    expect($response->toArray())
        ->toBeArray()
        ->toHaveCount(10)
        ->toHaveKeys([
            'totalContacts',
            'deliveredToCount',
            'bouncedCount',
            'droppedCount',
            'totalOpens',
            'totalUniqueOpens',
            'totalClickThroughs',
            'totalUniqueClickThroughs',
            'unsubscribeCount',
            'complaintsCount',
        ]);

    expect($response->toArray())->toBe(emailSentResource());
});

test('array accessible', function () {
    $response = EmailsSentDetailsResponse::from(emailSentResource());

    expect($response['totalContacts'])
        ->toBe(12)
        ->toBe($response->totalContacts);
});
