<?php

declare(strict_types=1);

namespace Conesso\Contracts\Resources;

use Conesso\Responses\Carts\CreateResponse;
use Conesso\Responses\Carts\ListResponse;
use Conesso\Responses\Carts\RetrieveResponse;
use Conesso\Responses\Carts\UpdateResponse;

interface CartsContract
{
    public function retrieve(string $id): RetrieveResponse;

    public function list(array $parameters = []): ListResponse;

    public function create(array $parameters): CreateResponse;

    public function update(string $id, array $parameters): UpdateResponse;

    public function delete(string $id): array;
}
