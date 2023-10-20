<?php

function listResource(): array
{
    return [
        'id' => 1,
        'name' => 'Test List',
        'description' => 'Test List Description',
        'isPrivate' => true,
        'optInRequired' => true,
        'contactNo' => 0,
        'tags' => [
            'Tag 1',
            'Tag 2',
        ],
        'createdAt' => '2021-01-01T00:00:00.000Z',
        'createdBy' => 'Test User',
        'updatedAt' => '2021-01-01T00:00:00.000Z',
        'updatedBy' => 'Test User',
        'status' => 'active',
    ];
}

function listListResource(): array
{
    return [
        listResource(),
        listResource(),
    ];
}
