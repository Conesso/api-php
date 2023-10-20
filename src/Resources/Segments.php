<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\SegmentsContract;
use Conesso\Resources\Concerns\Transportable;
use Conesso\Responses\Segments\CreateResponse;
use Conesso\Responses\Segments\DeleteResponse;
use Conesso\Responses\Segments\ListResponse;
use Conesso\Responses\Segments\RefreshResponse;
use Conesso\Responses\Segments\RetrieveResponse;
use Conesso\Responses\Segments\UpdateResponse;
use Conesso\ValueObjects\Transporter\Payload;

final class Segments implements SegmentsContract
{
    use Transportable;

    public function retrieve(int $id): RetrieveResponse
    {
        $payload = Payload::retrieve('segments', (string) $id);

        $response = $this->transporter->requestObject($payload);

        return RetrieveResponse::from($response->data());
    }

    public function list(array $parameters = []): ListResponse
    {
        $payload = Payload::list('segments', $parameters);

        $response = $this->transporter->requestObject($payload);

        return ListResponse::from($response->data(), $response->meta());
    }

    public function create(array $parameters): CreateResponse
    {
        $payload = Payload::create('segments', $parameters);

        $response = $this->transporter->requestObject($payload);

        return CreateResponse::from($response->data());
    }

    public function update(int $id, array $parameters): UpdateResponse
    {
        $payload = Payload::update('segments', (string) $id, $parameters);

        $response = $this->transporter->requestObject($payload);

        return UpdateResponse::from($response->data());
    }

    public function delete(int $id): DeleteResponse
    {
        $payload = Payload::delete('segments', (string) $id);

        $response = $this->transporter->requestObject($payload);

        return DeleteResponse::from($response->data());
    }

    public function refresh(int $id): RefreshResponse
    {
        $payload = Payload::update('segments', (string) $id, [], 'refresh');

        $response = $this->transporter->requestObject($payload);

        return RefreshResponse::from($response->data());
    }
}
