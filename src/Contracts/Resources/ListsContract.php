<?php

declare(strict_types=1);

namespace Conesso\Contracts\Resources;

use Conesso\Responses\Lists\CreateResponse;
use Conesso\Responses\Lists\DeleteResponse;
use Conesso\Responses\Lists\ListResponse;
use Conesso\Responses\Lists\RetrieveResponse;
use Conesso\Responses\Lists\UpdateResponse;

interface ListsContract
{
    public function retrieve(int $id): RetrieveResponse;

    public function list(): ListResponse;

    public function update(int $id, array $data): UpdateResponse;

    public function create(array $data): CreateResponse;

    public function delete(int $id): DeleteResponse;
}
