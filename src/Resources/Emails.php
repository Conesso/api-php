<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\EmailsContract;
use Conesso\Resources\Concerns\Transportable;
use Conesso\Responses\Emails\CreateResponse;
use Conesso\Responses\Emails\DeleteResponse;
use Conesso\Responses\Emails\ListResponse;
use Conesso\Responses\Emails\MergeTagsResponse;
use Conesso\Responses\Emails\RetrieveResponse;
use Conesso\Responses\Emails\TestResponse;
use Conesso\Responses\Emails\TestWithListResponse;
use Conesso\Responses\Emails\TriggerResponse;
use Conesso\Responses\Emails\UpdateResponse;
use Conesso\Responses\Emails\UrlResponse;
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

    public function create(array $parameters): CreateResponse
    {
        $payload = Payload::create('emails', $parameters);

        $response = $this->transporter->requestObject($payload);

        return CreateResponse::from($response->data());
    }

    public function update(string $id, array $parameters): UpdateResponse
    {
        $payload = Payload::update('emails', $id, $parameters);

        $response = $this->transporter->requestObject($payload);

        return UpdateResponse::from($response->data());
    }

    public function delete(int $id): DeleteResponse
    {
        $payload = Payload::delete('emails', (string) $id);

        $response = $this->transporter->requestObject($payload);

        return DeleteResponse::from($id, $response->data());
    }

    public function trigger(int $id, array $parameters = []): TriggerResponse
    {
        $payload = Payload::update('emails', (string) $id, $parameters, '/trigger');

        $response = $this->transporter->requestObject($payload);

        return TriggerResponse::from($id, $response->data());
    }

    public function test(string $id, array $parameters = []): TestResponse
    {
        $payload = Payload::create("emails/{$id}", $parameters, '/test');

        $response = $this->transporter->requestObject($payload);

        return TestResponse::from((int) $id, $response->data());
    }

    public function testList(string $id, string $listId): TestWithListResponse
    {
        $payload = Payload::create("emails/{$id}", [], "/test/{$listId}");

        $response = $this->transporter->requestObject($payload);

        return TestWithListResponse::from((int) $id, (int) $listId, $response->data());
    }

    public function mergeTags(int $id): MergeTagsResponse
    {
        $payload = Payload::create("emails/mergetags/{$id}", []);

        $response = $this->transporter->requestObject($payload);

        return MergeTagsResponse::from($id, $response->data());
    }

    public function urls(int $id): UrlResponse
    {
        $payload = Payload::list("emails/url/{$id}", []);

        $response = $this->transporter->requestObject($payload);

        return UrlResponse::from($response->data());
    }
}
