<?php

use Conesso\Responses\Products\RetrieveResponse;

test('from', function () {
    $response = RetrieveResponse::from(productResource());

    expect($response)->toBeInstanceOf(RetrieveResponse::class)
        ->id->toBe('4fb79610411f9bebf24a08e8def82e6e')
        ->apiReferenceId->toBe('api-reference-123')
        ->dateCreated->toBe(null)
        ->dateUpdated->toBe('2023-08-23T13:45:43.000Z')
        ->createdAt->toBe('2023-08-23T13:45:44.000Z')
        ->updatedAt->toBe('2023-08-23T13:45:44.000Z')
        ->sku->toBe('SKU-123')
        ->groupType->toBe('standalone-product')
        ->name->toBe('Test Product')
        ->description->toBe(null)
        ->barcode->toBe('1234567891013')
        ->uri->toBe('htttps://somewebsite.com/catalog/product/view/id/11/s/api-reference-123/key/d2b14133c0d4e65b90ac497c02cdb88216f41f26d6ef5877d2406f688cf611c4/')
        ->priceTax->toBe(2.0)
        ->originalPrice->toBe(0.0)
        ->price->toBe(12.0)
        ->priceIncTax->toBe(12.0)
        ->weight->toBe(12.0)
        ->weightUnit->toBe(null)
        ->stockQuantity->toBe(0)
        ->visibility->toBe('public')
        ->status->toBe('active')
        ->productImages->toBeArray()
        ->productImages->each->toBeInstanceOf(\Conesso\Responses\Products\ProductImageResponse::class);
});
