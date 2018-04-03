<?php
require_once __DIR__ . '/../vendor/autoload.php';

use DrMVC\Helpers\Generate;

$slug = Generate::slug('Ave Some');
echo $slug . "\n";

$utf8 = Generate::slug('Коллекция мягких французских булок');
echo $utf8 . "\n";

$url = Generate::gravatar('test@mail.com');
echo $url . "\n";

$img = Generate::gravatar('test@mail.com', '80', 'mm', 'g', true);
echo $img . "\n";
