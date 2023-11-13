<?php

declare(strict_types=1);

namespace Conesso\Contracts\Resources;

use Conesso\Responses\EcommerceCustomFields\CreateResponse;
use Conesso\Responses\EcommerceCustomFields\DeleteResponse;
use Conesso\Responses\EcommerceCustomFields\ListResponse;
use Conesso\Responses\EcommerceCustomFields\RetrieveResponse;
use Conesso\Responses\EcommerceCustomFields\UpdateResponse;

interface EcommerceCustomFieldsContract
{
    public function retrieve(string $id): RetrieveResponse;

    public function create(array $parameters): CreateResponse;

    public function list(array $parameters = []): ListResponse;

    public function update(string $id, array $parameters): UpdateResponse;

    public function delete(string $id): DeleteResponse;
}
