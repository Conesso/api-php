<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\ListsContract;
use Conesso\Resources\Concerns\Transportable;
use Conesso\Responses\Lists\CreateResponse;
use Conesso\Responses\Lists\DeleteResponse;
use Conesso\Responses\Lists\ListResponse;
use Conesso\Responses\Lists\RetrieveResponse;
use Conesso\Responses\Lists\UpdateResponse;
use Conesso\ValueObjects\Transporter\Payload;

final class Lists implements ListsContract
{
    use Transportable;

    public function retrieve(int $id): RetrieveResponse
    {
        $payload = Payload::retrieve('lists', (string) $id);

        $response = $this->transporter->requestObject($payload);

        return RetrieveResponse::from($response->data());
    }

    public function list(): ListResponse
    {
        $payload = Payload::list('lists');

        $response = $this->transporter->requestObject($payload);

        return ListResponse::from($response->data(), $response->meta());
    }

    public function update(int $id, array $data): UpdateResponse
    {
        $payload = Payload::update('lists', (string) $id, $data);

        $response = $this->transporter->requestObject($payload);

        return UpdateResponse::from($response->data());
    }

    public function create(array $data): CreateResponse
    {
        $payload = Payload::create('lists', $data);

        $response = $this->transporter->requestObject($payload);

        return CreateResponse::from($response->data());
    }

    public function delete(int $id): DeleteResponse
    {
        $payload = Payload::delete('lists', (string) $id);

        $response = $this->transporter->requestObject($payload);

        return DeleteResponse::from($response->data());
    }
}
