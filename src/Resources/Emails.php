<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\EmailsContract;
use Conesso\Resources\Concerns\Transportable;
use Conesso\Responses\Emails\ListResponse;
use Conesso\Responses\Emails\RetrieveResponse;
use Conesso\ValueObjects\Transporter\Payload;

final class Emails implements EmailsContract
{
    use Transportable;

    public function retrieve(string $id): RetrieveResponse
    {
        $payload = Payload::retrieve('emails', $id);

        $response = $this->transporter->requestObject($payload);

        return RetrieveResponse::from($response->data());
    }

    public function list(array $parameters = []): ListResponse
    {
        $payload = Payload::list('emails', $parameters);

        $response = $this->transporter->requestObject($payload);

        return ListResponse::from($response->data(), $response->meta());
    }

    public function create(array $parameters): array
    {
        // TODO: Implement create() method.
    }

    public function update(string $id, array $parameters): array
    {
        // TODO: Implement update() method.
    }

    public function delete(string $id): array
    {
        // TODO: Implement delete() method.
    }

    public function trigger(string $id): array
    {
        // TODO: Implement trigger() method.
    }

    public function test(string $id): array
    {
        // TODO: Implement test() method.
    }

    public function testList(string $id, string $listId): array
    {
        // TODO: Implement testList() method.
    }

    public function mergeTags(string $id): array
    {
        // TODO: Implement mergeTags() method.
    }

    public function url(string $id): string
    {
        // TODO: Implement url() method.
    }
}
