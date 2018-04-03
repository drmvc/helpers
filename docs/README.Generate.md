# DrMVC\Helpers\Generate

Generators of slug from text or gravatar's url.

## How to use 

```php
// Simple converter from any text to slug (with utf8 support)
$slug = Generate::slug('Ave Some'); // ave-some
$utf8 = Generate::slug('Коллекция мягких французских булок'); // коллекция-мягких-французских-булок

// Gravatar generator
$url = Generate::gravatar('test@mail.com'); // https://www.gravatar.com/avatar/97dfebf4098c0f5c16bca61e2b76c373?s=80&d=mm&r=g
$img = Generate::gravatar('test@mail.com', '80', 'mm', 'g', true); // <img src="https://www.gravatar.com/avatar/97dfebf4098c0f5c16bca61e2b76c373?s=80&d=mm&r=g" />
```

## More examples

Some other examples of usage you can find [here](../extra).
