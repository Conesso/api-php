<?php

use Conesso\Responses\Emails\EmailsSplitTestResponse;

test('from', function () {
    $response = EmailsSplitTestResponse::from(emailsSplitTestResource());

    expect($response)->toBeInstanceOf(EmailsSplitTestResponse::class)
        ->active->toBeFalse()
        ->sampleSize->toBe(100)
        ->metric->toBeNull()
        ->type->toBeNull()
        ->winningVariation->toBeNull()
        ->endTime->toBe(2);
});

test('to array', function () {
    $response = EmailsSplitTestResponse::from(emailsSplitTestResource());

    expect($response->toArray())
        ->toBeArray()
        ->toHaveCount(6)
        ->toHaveKeys([
            'active',
            'sampleSize',
            'metric',
            'type',
            'winningVariation',
            'endTime',
        ]);

    expect($response->toArray())->toBe(emailsSplitTestResource());
});

test('array accessible', function () {
    $response = EmailsSplitTestResponse::from(emailsSplitTestResource());

    expect($response['active'])
        ->toBeFalse()
        ->toBe($response->active);
});
