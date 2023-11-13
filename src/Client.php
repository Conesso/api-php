<?php

declare(strict_types=1);

namespace Conesso;

use Conesso\Contracts\ClientContract;
use Conesso\Contracts\Resources\CartsContract;
use Conesso\Contracts\Resources\ContactsContract;
use Conesso\Contracts\Resources\CustomFieldsContract;
use Conesso\Contracts\Resources\EcommerceCustomFieldsContract;
use Conesso\Contracts\Resources\EmailsContract;
use Conesso\Contracts\Resources\ListsContract;
use Conesso\Contracts\Resources\OrdersContract;
use Conesso\Contracts\Resources\ProductsContract;
use Conesso\Contracts\Resources\SegmentsContract;
use Conesso\Contracts\TransporterContract;
use Conesso\Resources\Carts;
use Conesso\Resources\Contacts;
use Conesso\Resources\CustomFields;
use Conesso\Resources\EcommerceCustomFields;
use Conesso\Resources\Emails;
use Conesso\Resources\Lists;
use Conesso\Resources\Orders;
use Conesso\Resources\Products;
use Conesso\Resources\Segments;

final class Client implements ClientContract
{
    private TransporterContract $transporter;

    public function __construct(TransporterContract $transporter)
    {
        $this->transporter = $transporter;
    }

    public function carts(): CartsContract
    {
        return new Carts($this->transporter);
    }

    public function customFields(): CustomFieldsContract
    {
        return new CustomFields($this->transporter);
    }

    public function contacts(): ContactsContract
    {
        return new Contacts($this->transporter);
    }

    public function ecommerceCustomFields(): EcommerceCustomFieldsContract
    {
        return new EcommerceCustomFields($this->transporter);
    }

    public function emails(): EmailsContract
    {
        return new Emails($this->transporter);
    }

    public function lists(): ListsContract
    {
        return new Lists($this->transporter);
    }

    public function orders(): OrdersContract
    {
        return new Orders($this->transporter);
    }

    public function products(): ProductsContract
    {
        return new Products($this->transporter);
    }

    public function segments(): SegmentsContract
    {
        return new Segments($this->transporter);
    }
}
