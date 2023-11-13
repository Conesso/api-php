<?php

declare(strict_types=1);

namespace Conesso\Contracts\Resources;

use Conesso\Responses\Segments\CreateResponse;
use Conesso\Responses\Segments\DeleteResponse;
use Conesso\Responses\Segments\ListResponse;
use Conesso\Responses\Segments\RefreshResponse;
use Conesso\Responses\Segments\RetrieveResponse;
use Conesso\Responses\Segments\UpdateResponse;

interface SegmentsContract
{
    public function retrieve(int $id): RetrieveResponse;

    public function list(array $parameters = []): ListResponse;

    public function create(array $parameters): CreateResponse;

    public function update(int $id, array $parameters): UpdateResponse;

    public function delete(int $id): DeleteResponse;

    public function refresh(int $id): RefreshResponse;
}
