<?php

function emailResource(): array
{
    return json_decode(emailDataResource(), true);
}

function emailListResource(): array
{
    return json_decode(emailsListResource(), true);
}

function emailTestResource(): array
{
    return [];
}

function emailSentResource(): array
{
    return [
        'totalContacts' => 12,
        'deliveredToCount' => 8,
        'bouncedCount' => 1,
        'droppedCount' => 1,
        'totalOpens' => 2,
        'totalUniqueOpens' => 2,
        'totalClickThroughs' => 1,
        'totalUniqueClickThroughs' => 1,
        'unsubscribeCount' => 1,
        'complaintsCount' => 1,
    ];
}

function emailsSplitTestResource(): array
{
    return [
        'active' => false,
        'sampleSize' => 100,
        'metric' => null,
        'type' => null,
        'winningVariation' => null,
        'endTime' => 2,
    ];
}

function emailsAudienceResource(): array
{
    return [
        'lists' => [
            emailsAudienceListResource(),
            emailsAudienceListResource(),
        ],
        'segments' => [],
    ];
}

function emailsAudienceListResource(): array
{
    return [
        'id' => 2,
        'name' => 'ViewInBrowser',
    ];
}

function emailsBodyResource(): array
{
    return [
        'activeVariation' => 'fer312s5b',
        'variations' => [
            emailBodyVariationResource(),
            emailBodyVariationResource(),
        ],
        'currentVersion' => emailBodyCurrentVersionResource(),
    ];
}

function emailBodyVariationResource(): array
{
    return [
        'id' => 2,
        'uid' => 'fer312s5b',
        'activeVersion' => 'b047e3a24',
        'versionsCount' => 6,
        'versions' => [
            emailBodyVariationVersionResource(),
            emailBodyVariationVersionResource(),
        ],
        'rowVariations' => [],
    ];
}

function emailBodyVariationVersionResource(): array
{
    return [
        'id' => 16,
        'uid' => 'b047e3a24',
        'content' => emailBodyVersionContentResource(),
    ];
}

function emailBodyCurrentVersionResource(): array
{
    return [
        'variationUid' => '',
        'uid' => '',
        'content' => emailBodyVersionContentResource(),
    ];
}

function emailBodyVersionContentResource(): array
{
    return [
        'jsonContent' => '{"page" {"body" {"rows" []}}}',
        'htmlContent' => '<html><head></head><body>EMAIL CONTENT</body></html>',
        'txtContent' => 'EMAIL CONTENT',
    ];
}

function emailUrlsResource(): array
{
    return [
        'https://www.facebook.com/',
        'http://twitter.com/',
        'https://instagram.com/',
    ];
}

function emailsMergeTagsResource(): array
{
    return [
        'mergeTags' => [
            'tag1',
            'tag2',
        ],
    ];
}

function emailSuccessActionResource(): array
{
    return [
        'success' => true,
    ];
}

function emailsListResource(): string
{
    return file_get_contents(__DIR__.'/EmailList.json');
}

function emailDataResource(): string
{
    return file_get_contents(__DIR__.'/Email.json');
}
