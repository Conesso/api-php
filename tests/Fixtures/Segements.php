<?php

function segmentListResource(): array
{
    return [
        segmentResource(),
        segmentResource(),
    ];
}

function segmentResource(): array
{
    return [
        'id' => 1,
        'name' => 'Segment 1',
        'uid' => 'sdfwers',
        'description' => 'Segment 1 description',
        'autoRefresh' => 0,
        'contactNo' => 03423423423,
        'refreshStatus' => 'pending',
        'refreshDate' => '2020-01-01',
        'createdAt' => '2020-01-01',
        'createdBy' => 'John Doe',
        'updatedAt' => '2020-01-01',
        'updatedBy' => 'John Doe',
        'status' => 'active',
        'tags' => [
            'tag 1',
            'tag 2',
        ],
        'condition' => segmentConditionResource(),
    ];
}

function segmentConditionResource(): array
{
    return [
        'type' => 'and',
        'target' => 'contact',
        'operator' => 'eq',
        'value1' => 'value 1',
        'value2' => 'value 2',
        'conditions' => [
            'string',
        ],
    ];
}
