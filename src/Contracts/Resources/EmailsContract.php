<?php

declare(strict_types=1);

namespace Conesso\Contracts\Resources;

use Conesso\Responses\Emails\CreateResponse;
use Conesso\Responses\Emails\DeleteResponse;
use Conesso\Responses\Emails\ListResponse;
use Conesso\Responses\Emails\MergeTagsResponse;
use Conesso\Responses\Emails\RetrieveResponse;
use Conesso\Responses\Emails\TestResponse;
use Conesso\Responses\Emails\TestWithListResponse;
use Conesso\Responses\Emails\TriggerResponse;
use Conesso\Responses\Emails\UpdateResponse;
use Conesso\Responses\Emails\UrlResponse;

interface EmailsContract
{
    public function retrieve(string $id): RetrieveResponse;

    public function list(array $parameters = []): ListResponse;

    public function create(array $parameters): CreateResponse;

    public function update(string $id, array $parameters): UpdateResponse;

    public function delete(int $id): DeleteResponse;

    public function trigger(int $id, array $parameters = []): TriggerResponse;

    public function test(string $id): TestResponse;

    public function testList(string $id, string $listId): TestWithListResponse;

    public function mergeTags(int $id): MergeTagsResponse;

    public function urls(int $id): UrlResponse;
}
