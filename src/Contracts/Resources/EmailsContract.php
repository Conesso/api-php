<?php

declare(strict_types=1);

namespace Conesso\Contracts\Resources;

use Conesso\Responses\Emails\ListResponse;
use Conesso\Responses\Emails\RetrieveResponse;

interface EmailsContract
{
    public function retrieve(string $id): RetrieveResponse;

    public function list(array $parameters = []): ListResponse;

    public function create(array $parameters): array;

    public function update(string $id, array $parameters): array;

    public function delete(string $id): array;

    public function trigger(string $id): array;

    public function test(string $id): array;

    public function testList(string $id, string $listId): array;

    public function mergeTags(string $id): array;

    public function url(string $id): string;
}
