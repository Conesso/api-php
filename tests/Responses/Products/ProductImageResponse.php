<?php

use Conesso\Responses\Products\ProductImageResponse;

test('from', function () {
    $response = ProductImageResponse::from(productImageResource());

    expect($response)->toBeInstanceOf(ProductImageResponse::class)
        ->id->toBe('8c2b26e92605c610927c928851224800')
        ->productId->toBe('d58c2b26e92605c610927c9288512248')
        ->uri->toBe('http://your-site.com/products/images/314299838955987890')
        ->uriImageMd5->toBe(null)
        ->s3Url->toBe(null)
        ->s3ImageMd5->toBe(null)
        ->dateS3Built->toBe(null)
        ->imageName->toBe('back')
        ->position->toBe(null);
});
