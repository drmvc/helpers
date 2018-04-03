<?php
require_once __DIR__ . '/../vendor/autoload.php';

use DrMVC\Helpers\Clean;

$tests[1] = 'data';
$tests[2] = '~!@#$%^&*()_+';
$tests[3] = 'test123<\br>';

echo Clean::run($tests[1])."\n";
echo Clean::run($tests[2])."\n";
echo Clean::run($tests[3])."\n";
