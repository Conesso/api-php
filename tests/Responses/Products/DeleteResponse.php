<?php

use Conesso\Responses\Products\DeleteResponse;

test('from', function () {
    $response = DeleteResponse::from('4fb79610411f9bebf24a08e8def82e6e', [
        'deleted' => true,
    ]);

    expect($response)->toBeInstanceOf(DeleteResponse::class)
        ->id->toBe('4fb79610411f9bebf24a08e8def82e6e')
        ->deleted->toBeTrue();
});
