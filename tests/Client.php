<?php

use Conesso\Client;
use Conesso\Contracts\Resources\CartsContract;
use Conesso\Contracts\Resources\ContactsContract;
use Conesso\Contracts\Resources\CustomFieldsContract;
use Conesso\Contracts\Resources\EcommerceContract;
use Conesso\Contracts\Resources\EmailsContract;
use Conesso\Contracts\Resources\ListsContract;
use Conesso\Contracts\Resources\OrdersContract;
use Conesso\Contracts\Resources\ProductsContract;
use Conesso\Contracts\Resources\SegmentsContract;
use Conesso\Contracts\TransporterContract;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
    $this->client = new Client($this->transporter);
});

it('can get carts', function () {
    expect($this->client->carts())->toBeInstanceOf(CartsContract::class);
});

it('can get custom fields', function () {
    expect($this->client->customFields())->toBeInstanceOf(CustomFieldsContract::class);
});

it('can get contacts', function () {
    expect($this->client->contacts())->toBeInstanceOf(ContactsContract::class);
});

it('can get ecommerce', function () {
    expect($this->client->ecommerce())->toBeInstanceOf(EcommerceContract::class);
});

it('can get emails', function () {
    expect($this->client->emails())->toBeInstanceOf(EmailsContract::class);
});

it('can get lists', function () {
    expect($this->client->lists())->toBeInstanceOf(ListsContract::class);
});

it('can get orders', function () {
    expect($this->client->orders())->toBeInstanceOf(OrdersContract::class);
});

it('can get products', function () {
    expect($this->client->products())->toBeInstanceOf(ProductsContract::class);
});

it('can get segments', function () {
    expect($this->client->segments())->toBeInstanceOf(SegmentsContract::class);
});
