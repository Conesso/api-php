<?php

function contactResource(): array
{
    return [
        'id' => 17,
        'uid' => '612ab6ffde833468ab5f9ca16b88a8973',
        'email' => 'john@conesso.io',
        'firstName' => 'Doe',
        'lastName' => 'John',
        'name' => 'Doe John',
        'preferredName' => 'Jonny',
        'apiIntegration' => null,
        'apiResource' => null,
        'gender' => 'Male',
        'company' => 'Conesso',
        'jobTitle' => 'Lead Developer',
        'address' => '1 Test Street',
        'address2' => 'Test Area',
        'city' => 'Test Town',
        'county' => 'Testshire',
        'postcode' => 'TE5 7ER',
        'country' => 'Testrica',
        'countryCode' => 'TE',
        'tags' => [
            'dog',
            'pet',
            'test',
        ],
        'industry' => 'QA',
        'website' => 'https://conesso.io',
        'employmentStatus' => 'Employed',
        'ethnicGroup' => 'White',
        'device' => 'Desktop',
        'suppressed' => 'none',
        'createdAt' => '2023-06-05T14:43:01.000Z',
        'createdBy' => 'Marc Sandbox Programmatic',
        'updatedAt' => '2023-06-05T14:43:01.000Z',
        'updatedBy' => 'Marc Sandbox Programmatic',
        'apiReferenceId' => '123456789',
        'optInStatus' => 'transactionalOnly',
        'optInAt' => '2023-06-05T14:43:01.000Z',
        'optInEmail' => null,
        'optInConfTime' => '2023-06-05T14:43:01.000Z',
        'phoneNumber' => '01234567890',
        'dateOfBirth' => '2023-06-05T14:43:01.000Z',
        'importId' => '123456789',
        'source' => 'Postman',
        'systemSource' => 'api',
        'lastEmailed' => '2023-06-05T14:43:01.000Z',
        'lastResubscribeEmailSentDate' => '2023-06-05T14:43:01.000Z',
        'lastClicked' => '2023-06-05T14:43:01.000Z',
        'lastIp' => '127.0.0.1',
        'statusLog' => '2023-06-05T14:43:01.000Z',
        'statusAt' => '2023-06-05T14:43:01.000Z',
        'lastOpened' => '2023-06-05T14:43:01.000Z',
        'optOutAt' => '2023-06-05T14:43:01.000Z',
        'contentLocale' => 'en_GB',
        'engagementScore' => 50,
        'externalCreateAt' => '2023-06-05T14:43:01.000Z',
        'optInSentByUserDate' => '2023-06-05T14:43:01.000Z',
        'customFields' => [
            'custom1' => 'custom1',
        ],
        'isMarketable' => false,
        'lists' => [
            'list1',
        ],
        'suppressedLists' => [
            'list2',
        ],
    ];
}

function contactListResource(): array
{
    return [
        contactResource(),
        contactResource(),
        contactResource(),
        contactResource(),
    ];
}
