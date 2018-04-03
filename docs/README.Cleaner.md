# DrMVC\Helpers\Cleaner

Simple cleaner of variable.

## How to use 

* `int` - Keep only integer values
* `float` - Keep integers, dots and commas
* `text` - Keep only characters (rus, eng)
* If work mode is not provided, then soft cleaning by default

```php
$tests = [
    'data',
    '~!@#$%^&*()_+ ',
    'test123\r\n\r\n',
    '1,2,3\n\n',
    'get_5_user.json'
];

Clean::run($this->tests[3], 'int'); // 123
Clean::run($this->tests[3], 'float') // 1,2,3
Clean::run($this->tests[4], 'text') // getuserjson
Clean::run($this->tests[1] // ~!@#$%^&amp;*()_+
```

## More examples

Some other examples of usage you can find [here](../extra).
