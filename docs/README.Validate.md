# DrMVC\Helpers\Validate

Few validators for simple checks.

## How to use 

```php
// MAC-address validation
$mac_valid = 'aa:bb:cc:dd:ee:ff';
$mac_invalid = 'mac-address';

Validators::isValidMAC($mac_valid); // true
Validators::isValidMAC($mac_invalid); // false

// URL validation
$url_valid = 'http://example.com';
$url_invalid = 'http:/example.com';

Validators::isValidURL($url_valid); // true
Validators::isValidURL($url_invalid); // false

// Email validation
$email_valid = 'test@mail.com';
$email_invalid = 'z test@mail.com';

Validators::isValidEmail($email_valid); // true
Validators::isValidEmail($email_invalid); // false

// UUID validation
$uuid_valid = '385778ea-3732-11e8-9e6e-c3b2f9b31a12';
$uuid_valid2 = '385778ea373211e89e6ec3b2f9b31a12';
$uuid_invalid = 'zzz';

Validators::isValidUUID($uuid_valid); // true
Validators::isValidUUID($uuid_valid2); // true
Validators::isValidUUID($uuid_invalid); // false
```

## More examples

Some other examples of usage you can find [here](../extra).
