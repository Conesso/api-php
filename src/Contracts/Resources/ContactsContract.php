<?php

declare(strict_types=1);

namespace Conesso\Contracts\Resources;

use Conesso\Responses\Contacts\ListResponse;
use Conesso\Responses\Contacts\RetrieveResponse;

interface ContactsContract
{
    /**
     * Returns information about a specific contact.
     *
     * @see https://api.conesso.io/v2/docs/#/Contacts/ContactController_findOne
     */
    public function retrieve(int $id): RetrieveResponse;

    /**
     * Returns a list of contacts.
     *
     * @see https://api.conesso.io/v2/docs/#/Contacts/ContactController_findAll
     */
    public function list(int $count = null, int $page = null, array $filter = [], array $customFilter = []): ListResponse;
}
