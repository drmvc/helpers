# DrMVC\Helpers\UUID

Few validators for simple checks.

## How to use 

```php
$namespace = '216e779d-095c-4e43-bfad-212232bae2e6';
$name = 'test';

// Generate static uuid
$v3 = UUID::v3($namespace, $name); // 267146ec-e2c8-3ded-967c-f92849410410
$v5 = UUID::v5($namespace, $name); // 46f3b106-5a5c-5dc1-a951-4a6f23dc87e4

// Generate random UUID
$rnd = UUID::v4();
$v3 = UUID::v3(UUID::v4(), $name);
$v5 = UUID::v5(UUID::v4(), $name);
```

## More examples

Some other examples of usage you can find [here](../extra).
