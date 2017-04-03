<?php

require_once(__DIR__ . '/../src/Cleaner.php');

use PHPUnit\Framework\TestCase;
use DrMVC\Helpers\Cleaner;

class CleanerTest extends TestCase
{
    /**
     * Some variants for tests
     *
     * @var array
     */
    private $tests;

    /**
     * CleanerTest constructor.
     * @param null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        /**
         * Default tests
         */
        $this->tests[1] = "data";
        $this->tests[2] = "ё!@#$%^&*()_+";
        $this->tests[3] = "test123\n\n";
    }

    /**
     * Check the default workmode
     */
    public function testDefault()
    {
        $this->assertTrue(Cleaner::run($this->tests[1]) == "data");
        $this->assertTrue(Cleaner::run($this->tests[2]) == "ё!@#$%^&*()_+");
        $this->assertTrue(Cleaner::run($this->tests[3]) == "test123<br/><br/>");
    }

}
