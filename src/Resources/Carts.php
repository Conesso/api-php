<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\CartsContract;
use Conesso\Resources\Concerns\Transportable;
use Conesso\Responses\Carts\CreateResponse;
use Conesso\Responses\Carts\DeleteResponse;
use Conesso\Responses\Carts\ListResponse;
use Conesso\Responses\Carts\RetrieveResponse;
use Conesso\Responses\Carts\UpdateResponse;
use Conesso\ValueObjects\Transporter\Payload;

final class Carts implements CartsContract
{
    use Transportable;

    public function retrieve(string $id): RetrieveResponse
    {
        $payload = Payload::retrieve('carts', $id);

        $response = $this->transporter->requestObject($payload);

        return RetrieveResponse::from($response->data());
    }

    public function list(array $parameters = []): ListResponse
    {
        $payload = Payload::list('carts', $parameters);

        $response = $this->transporter->requestObject($payload);

        return ListResponse::from($response->data(), $response->meta());
    }

    public function create(array $parameters): CreateResponse
    {
        $payload = Payload::create('carts', $parameters);

        $response = $this->transporter->requestObject($payload);

        return CreateResponse::from($response->data());
    }

    public function update(string $id, array $parameters): UpdateResponse
    {
        $payload = Payload::update('carts', $id, $parameters);

        $response = $this->transporter->requestObject($payload);

        return UpdateResponse::from($response->data());
    }

    public function delete(string $id): DeleteResponse
    {
        $payload = Payload::delete('carts', $id);

        $response = $this->transporter->requestObject($payload);

        return DeleteResponse::from($id, $response->data());
    }
}
