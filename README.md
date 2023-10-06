# Getting started

```bash
composer require conesso/client
composer require guzzlehttp/guzzle
```

```php
$apiKey = 'asdsldfuifhsksdfe';

$client = Conesso::client($apiKey);

$contact = $contacts->contacts()->retrieve(18);

foreach ($contact->data as $result) {
    $result->id; // 18
    $result->name; // 'John Doe'
    $result->email; // 'john.doe@example'
    $result->phone; // '123456789'
    $result->address; // '123 Main St'
}
```
