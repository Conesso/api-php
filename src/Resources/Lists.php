<?php

declare(strict_types=1);

namespace Conesso\Resources;

use Conesso\Contracts\Resources\ListsContract;
use Conesso\Resources\Concerns\Transportable;
use Conesso\Responses\Lists\ListResponse;
use Conesso\Responses\Lists\RetrieveResponse;
use Conesso\ValueObjects\Transporter\Payload;

final class Lists implements ListsContract
{
    use Transportable;

    public function list(): ListResponse
    {
        $payload = Payload::list('lists');

        $response = $this->transporter->requestObject($payload);

        return ListResponse::from($response);
    }

    public function get(int $id): RetrieveResponse
    {
        $payload = Payload::retrieve('lists', $id);

        $response = $this->transporter->requestObject($payload);

        return RetrieveResponse::from($response);
    }
}
