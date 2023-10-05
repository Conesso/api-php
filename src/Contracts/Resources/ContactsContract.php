<?php

declare(strict_types=1);

namespace Conesso\Contracts\Resources;

use Conesso\Responses\Contacts\RetrieveResponse;

interface ContactsContract
{
    /**
     * Returns information about a specific contact.
     *
     * @see https://api.conesso.io/v2/docs/#/Contacts/ContactController_findOne
     */
    public function retrieve(int $id): RetrieveResponse;
}
