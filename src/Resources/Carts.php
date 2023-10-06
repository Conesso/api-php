<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\CartsContract;
use Conesso\Resources\Concerns\Transportable;
use Conesso\Responses\Carts\ListResponse;
use Conesso\Responses\Carts\RetrieveResponse;
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

    public function list(
        int $count = null,
        int $page = null,
        ?array $filters = [],
        string $searchKey = null
    ): ListResponse {
        $payload = Payload::list('carts', [
            'count' => $count,
            'page' => $page,
            'filter' => [$filters],
            'searchKey' => $searchKey,
        ]);

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
}
