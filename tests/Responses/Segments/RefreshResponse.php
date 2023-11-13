<?php

use Conesso\Responses\Segments\RefreshResponse;

test('from', function () {
    $response = RefreshResponse::from([
        'id' => 1,
        'success' => true,
    ]);

    expect($response)->toBeInstanceOf(RefreshResponse::class)
        ->id->toBe(1)
        ->success->toBeTrue();
});
