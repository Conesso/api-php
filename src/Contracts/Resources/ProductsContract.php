<?php

declare(strict_types=1);

namespace Conesso\Contracts\Resources;

use Conesso\Responses\Products\CreateResponse;
use Conesso\Responses\Products\DeleteResponse;
use Conesso\Responses\Products\ListResponse;
use Conesso\Responses\Products\RetrieveResponse;
use Conesso\Responses\Products\Stock\RetrieveStockResponse;
use Conesso\Responses\Products\Stock\UpdateStockResponse;
use Conesso\Responses\Products\UpdateResponse;

interface ProductsContract
{
    public function retrieve(string $id): RetrieveResponse;

    public function list(array $parameters = []): ListResponse;

    public function create(array $parameters): CreateResponse;

    public function update(string $id, array $parameters): UpdateResponse;

    public function delete(string $id): DeleteResponse;

    public function stock(string $id): RetrieveStockResponse;

    public function updateStock(string $id, array $parameters): UpdateStockResponse;
}
