<?php
require_once __DIR__ . '/../vendor/autoload.php';

use DrMVC\Helpers\UUID;

$namespace = '216e779d-095c-4e43-bfad-212232bae2e6';
$name = 'test';

echo UUID::v3($namespace, $name); // 267146ec-e2c8-3ded-967c-f92849410410
echo "\n";

echo UUID::v4(); // Random UUID
echo "\n";

echo UUID::v5($namespace, $name); // 46f3b106-5a5c-5dc1-a951-4a6f23dc87e4
echo "\n";
