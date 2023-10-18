<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\EcommerceCustomFieldsContract;
use Conesso\Resources\Concerns\Transportable;
use Conesso\Responses\EcommerceCustomFields\CreateResponse;
use Conesso\Responses\EcommerceCustomFields\DeleteResponse;
use Conesso\Responses\EcommerceCustomFields\ListResponse;
use Conesso\Responses\EcommerceCustomFields\RetrieveResponse;
use Conesso\Responses\EcommerceCustomFields\UpdateResponse;
use Conesso\ValueObjects\Transporter\Payload;

final class EcommerceCustomFields implements EcommerceCustomFieldsContract
{
    use Transportable;

    public function retrieve(string $id): RetrieveResponse
    {
        $payload = Payload::retrieve('ecommerce/custom-fields', $id);

        $response = $this->transporter->requestObject($payload);

        return RetrieveResponse::from($response->data());
    }

    public function create(array $parameters): CreateResponse
    {
        $payload = Payload::create('ecommerce/custom-fields', $parameters);

        $response = $this->transporter->requestObject($payload);

        return CreateResponse::from($response->data());
    }

    public function list(array $parameters = []): ListResponse
    {
        $payload = Payload::list('ecommerce/custom-fields', $parameters);

        $response = $this->transporter->requestObject($payload);

        return ListResponse::from($response->data());
    }

    public function update(string $id, array $parameters): UpdateResponse
    {
        $payload = Payload::update('ecommerce/custom-fields', $id, $parameters);

        $response = $this->transporter->requestObject($payload);

        return UpdateResponse::from($response->data());
    }

    public function delete(string $id): DeleteResponse
    {
        $payload = Payload::delete('ecommerce/custom-fields', $id);

        $response = $this->transporter->requestObject($payload);

        return DeleteResponse::from($response->data());
    }
}
