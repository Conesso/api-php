<?php

function ecommerceCustomFieldsResource(): array
{
    return [
        'id' => 4,
        'name' => 'Custom Field 1',
        'dataType' => 'string',
        'nameKey' => 'custom_field_1',
        'description' => 'Custom Field 1 Description',
        'defaultValue' => 'Custom Field 1 Default Value',
        'isPrivate' => false,
        'createdAt' => '2023-06-20T09:14:15.000Z',
        'createdBy' => 'Test User',
        'updatedAt' => '2023-06-20T09:14:15.000Z',
        'updatedBy' => 'Test User',
        'ecommerceType' => 'all',
    ];
}

function ecommerceCustomFieldsListResource(): array
{
    return [
        ecommerceCustomFieldsResource(),
        ecommerceCustomFieldsResource(),
        ecommerceCustomFieldsResource(),
    ];
}

function ecommerceCustomFieldsDeleteResource(): array
{
    return [
        'deleted' => true,
    ];
}
