<?php

function productResource(): array
{
    return json_decode(product(), true);
}

function productListResource(): array
{
    return json_decode(productList(), true);
}

function productImageResource(): array
{
    return [
        'id' => '8c2b26e92605c610927c928851224800',
        'productId' => 'd58c2b26e92605c610927c9288512248',
        'uri' => 'http://your-site.com/products/images/314299838955987890',
        'uriImageMd5' => null,
        's3Url' => null,
        's3ImageMd5' => null,
        'dateS3Built' => null,
        'imageName' => 'back',
        'position' => null,
    ];
}

function productStockResource(): array
{
    return [
        'id' => 'b79610411f9bebf24a08e8def82e6e28',
        'productId' => '4fb79610411f9bebf24a08e8def82e6e',
        'quantity' => 0,
        'status' => 'out-of-stock',
        'createdAt' => '2023-08-23T13:45:44.000Z',
        'updatedAt' => '2023-08-23T13:45:44.000Z',
    ];
}

function productList(): string
{
    return file_get_contents(__DIR__.'/ProductsList.json');
}

function product(): string
{
    return file_get_contents(__DIR__.'/Products.json');
}
