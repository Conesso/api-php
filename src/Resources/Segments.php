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
        // TODO: Implement create() method.
    }

    public function update(int $id, array $parameters): UpdateResponse
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): DeleteResponse
    {
        // TODO: Implement delete() method.
    }

    public function refresh(int $id): RefreshResponse
    {
        // TODO: Implement refresh() method.
    }
}
