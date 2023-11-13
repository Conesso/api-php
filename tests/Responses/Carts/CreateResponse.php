<?php

use Conesso\Responses\Carts\CreateResponse;

test('from', function () {
    $response = CreateResponse::from(cartResource());

    expect($response)->toBeInstanceOf(CreateResponse::class)
        ->customerEmail->toBe('adam.paterson@conesso.io')
        ->apiReferenceId->toBe('870211')
        ->customerIsGuest->toBe(true)
        ->cartProducts->toBeArray()->toHaveCount(2);
});
