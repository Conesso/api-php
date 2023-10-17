<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\CustomFieldsContract;
use Conesso\Resources\Concerns\Transportable;
use Conesso\Responses\CustomFields\CreateResponse;
use Conesso\Responses\CustomFields\DeleteResponse;
use Conesso\Responses\CustomFields\ListResponse;
use Conesso\Responses\CustomFields\RetrieveResponse;
use Conesso\Responses\CustomFields\UpdateResponse;
use Conesso\ValueObjects\Transporter\Payload;

final class CustomFields implements CustomFieldsContract
{
    use Transportable;

    public function list(): ListResponse
    {
        $payload = Payload::list('custom-fields');

        $response = $this->transporter->requestObject($payload);

        return ListResponse::from($response->data(), $response->meta());
    }

    public function retrieve(int $id): RetrieveResponse
    {
        $payload = Payload::retrieve('custom-fields', (string) $id);

        $response = $this->transporter->requestObject($payload);

        return RetrieveResponse::from($response->data());
    }

    public function create(array $parameters): CreateResponse
    {
        $payload = Payload::create('custom-fields', $parameters);

        $response = $this->transporter->requestObject($payload);

        return CreateResponse::from($response->data());
    }

    public function update(int $id, array $parameters): UpdateResponse
    {
        $payload = Payload::update('custom-fields', (string) $id, $parameters);

        $response = $this->transporter->requestObject($payload);

        return UpdateResponse::from($response->data());
    }

    public function delete(int $id): DeleteResponse
    {
        $payload = Payload::delete('custom-fields', (string) $id);

        $response = $this->transporter->requestObject($payload);

        return DeleteResponse::from($id, $response->data());
    }
}
