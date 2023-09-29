<?php

declare(strict_types=1);

namespace Conesso\Contracts;

use Conesso\Contracts\Resources\CartsContract;
use Conesso\Contracts\Resources\ContactsContract;
use Conesso\Contracts\Resources\CustomFieldsContract;
use Conesso\Contracts\Resources\EcommerceContract;
use Conesso\Contracts\Resources\EmailsContract;
use Conesso\Contracts\Resources\ListsContract;
use Conesso\Contracts\Resources\OrdersContract;
use Conesso\Contracts\Resources\ProductsContract;
use Conesso\Contracts\Resources\SegmentsContract;

interface ClientContract
{
    public const VERSION = '0.1.0';

    public function carts(): CartsContract;

    public function contacts(): ContactsContract;

    public function products(): ProductsContract;

    public function emails(): EmailsContract;

    public function lists(): ListsContract;

    public function ecommerce(): EcommerceContract;

    public function segments(): SegmentsContract;

    public function customFields(): CustomFieldsContract;

    public function orders(): OrdersContract;
}
