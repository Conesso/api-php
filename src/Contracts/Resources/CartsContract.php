<?php

declare(strict_types=1);

namespace Conesso\Contracts\Resources;

use Conesso\Responses\Carts\ListResponse;
use Conesso\Responses\Carts\RetrieveResponse;

interface CartsContract
{
    public function retrieve(string $id): RetrieveResponse;

    public function list(int $count = null, int $page = null, ?array $filters = [], string $searchKey = null): ListResponse;

    public function create(array $parameters): array;

    public function update(string $id, array $parameters): array;

    public function delete(string $id): array;
}
