<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\ProductsContract;
use Conesso\Resources\Concerns\Transportable;
use Conesso\Responses\Products\CreateResponse;
use Conesso\Responses\Products\DeleteResponse;
use Conesso\Responses\Products\ListResponse;
use Conesso\Responses\Products\RetrieveResponse;
use Conesso\Responses\Products\Stock\RetrieveStockResponse;
use Conesso\Responses\Products\Stock\UpdateStockResponse;
use Conesso\Responses\Products\UpdateResponse;
use Conesso\ValueObjects\Transporter\Payload;

final class Products implements ProductsContract
{
    use Transportable;

    public function retrieve(string $id): RetrieveResponse
    {
        $payload = Payload::retrieve('products', $id);

        $response = $this->transporter->requestObject($payload);

        return RetrieveResponse::from($response->data());
    }

    public function list(array $parameters = []): ListResponse
    {
        $payload = Payload::list('products', $parameters);

        $response = $this->transporter->requestObject($payload);

        return ListResponse::from($response->data(), $response->meta());
    }

    public function create(array $parameters): CreateResponse
    {
        $payload = Payload::create('products', $parameters);

        $response = $this->transporter->requestObject($payload);

        return CreateResponse::from($response->data());
    }

    public function update(string $id, array $parameters): UpdateResponse
    {
        $payload = Payload::update('products', $id, $parameters);

        $response = $this->transporter->requestObject($payload);

        return UpdateResponse::from($response->data());
    }

    public function delete(string $id): DeleteResponse
    {
        $payload = Payload::delete('products', $id);

        $response = $this->transporter->requestObject($payload);

        return DeleteResponse::from($id, $response->data());
    }

    public function stock(string $id): RetrieveStockResponse
    {
        $payload = Payload::retrieve('products/stock', $id);

        $response = $this->transporter->requestObject($payload);

        return RetrieveStockResponse::from($response->data());
    }

    public function updateStock(string $id, array $parameters): UpdateStockResponse
    {
        $payload = Payload::update('products/stock', $id, $parameters);

        $response = $this->transporter->requestObject($payload);

        return UpdateStockResponse::from($response->data());
    }
}
