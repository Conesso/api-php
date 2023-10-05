<?php

require __DIR__.'/vendor/autoload.php';

$apiKey = '9cba262882b87f3b31e4f843adf3d66f19d321d6d7673b19c2e61f6f07abf2a2';

$conesso = Conesso::factory()
    ->withBaseUri('https://api.qa.conesso.io/v2')
    ->withApiKey($apiKey)
    ->make();

$contact = $conesso->contacts()->retrieve(2);

var_dump($contact->toArray());
