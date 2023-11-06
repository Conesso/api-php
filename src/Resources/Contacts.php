<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\ContactsContract;
use Conesso\Resources\Concerns\Transportable;
use Conesso\Responses\Contacts\CreateResponse;
use Conesso\Responses\Contacts\DeleteResponse;
use Conesso\Responses\Contacts\ListEmailsResponse;
use Conesso\Responses\Contacts\ListResponse;
use Conesso\Responses\Contacts\RetrieveResponse;
use Conesso\Responses\Contacts\UpdateResponse;
use Conesso\ValueObjects\Transporter\Payload;

final class Contacts implements ContactsContract
{
    use Transportable;

    public function retrieve(string $id): RetrieveResponse
    {
        $payload = Payload::retrieve('contacts', $id);

        $response = $this->transporter->requestObject($payload);

        return RetrieveResponse::from($response->data());
    }

    public function create(array $parameters): CreateResponse
    {
        $payload = Payload::create('contacts', $parameters);

        $response = $this->transporter->requestObject($payload);

        return CreateResponse::from($response->data());
    }

    public function list(array $parameters = []): ListResponse
    {
        $payload = Payload::list('contacts', $parameters);

        $response = $this->transporter->requestObject($payload);

        return ListResponse::from($response->data(), $response->meta());
    }

    public function update(int $id, array $parameters): UpdateResponse
    {
        $payload = Payload::update('contacts', (string) $id, $parameters);

        $response = $this->transporter->requestObject($payload);

        return UpdateResponse::from($response->data());
    }

    public function delete(int $id): DeleteResponse
    {
        $payload = Payload::delete('contacts', (string) $id);

        $response = $this->transporter->requestObject($payload);

        return DeleteResponse::from($id, $response->data());
    }

    public function emails(string $id, array $parameters = []): ListEmailsResponse
    {
        $payload = Payload::retrieve('contacts', $id, '/emails');

        $response = $this->transporter->requestObject($payload);

        return ListEmailsResponse::from($response->data(), $response->meta());
    }
}
