<?php

use Conesso\Responses\Segments\DeleteResponse;

test('from', function () {
    $response = DeleteResponse::from([
        'id' => 1,
        'deleted' => true,
    ]);

    expect($response)->toBeInstanceOf(DeleteResponse::class)
        ->id->toBe(1)
        ->deleted->toBeTrue();
});
