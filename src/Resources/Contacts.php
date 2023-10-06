<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\ContactsContract;
use Conesso\Resources\Concerns\Transportable;
use Conesso\Responses\Contacts\ListResponse;
use Conesso\Responses\Contacts\RetrieveResponse;
use Conesso\ValueObjects\Transporter\Payload;

final class Contacts implements ContactsContract
{
    use Transportable;

    public function retrieve(int $id): RetrieveResponse
    {
        $payload = Payload::retrieve('contacts', $id);

        $response = $this->transporter->requestObject($payload);

        return RetrieveResponse::from($response->data());
    }

    public function list(
        int $count = null,
        int $page = null,
        array $filter = [],
        array $customFilter = []
    ): ListResponse {
        $payload = Payload::list('contacts', [
            'count' => $count,
            'page' => $page,
            'filter' => [$filter],
            'customFilter' => [$customFilter],
        ]);

        $response = $this->transporter->requestObject($payload);

        return ListResponse::from($response->data(), $response->meta());
    }
}
