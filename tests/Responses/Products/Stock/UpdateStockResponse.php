<?php

use Conesso\Responses\Products\Stock\RetrieveStockResponse;
use Conesso\Responses\Products\Stock\UpdateStockResponse;

test('from', function () {
    $response = UpdateStockResponse::from(productStockResource());

    expect($response)->stock->toBeInstanceOf(RetrieveStockResponse::class);
});
