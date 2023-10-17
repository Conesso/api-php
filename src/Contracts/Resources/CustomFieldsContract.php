<?php

declare(strict_types=1);

namespace Conesso\Contracts\Resources;

use Conesso\Responses\CustomFields\CreateResponse;
use Conesso\Responses\CustomFields\DeleteResponse;
use Conesso\Responses\CustomFields\ListResponse;
use Conesso\Responses\CustomFields\RetrieveResponse;
use Conesso\Responses\CustomFields\UpdateResponse;

interface CustomFieldsContract
{
    public function list(): ListResponse;

    public function retrieve(int $id): RetrieveResponse;

    public function create(array $parameters): CreateResponse;

    public function update(int $id, array $parameters): UpdateResponse;

    public function delete(int $id): DeleteResponse;
}
