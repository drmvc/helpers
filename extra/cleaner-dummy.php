<?php

require_once(__DIR__ . '/../src/Cleaner.php');

use DrMVC\Helpers\Cleaner;

$tests[1] = "data";
$tests[2] = "~!@#$%^&*()_+";
$tests[3] = "test123\n\n";

echo Cleaner::run($tests[1])."\n";
echo Cleaner::run($tests[2])."\n";
echo Cleaner::run($tests[3])."\n";
