<?php namespace DrMVC\Helpers;
include __DIR__ . "/../src/Cleaner.php";

use PHPUnit\Framework\TestCase;

class CleanerTest extends TestCase
{
    /**
     * Some variants for tests
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
        $this->tests[2] = "~!@#$%^&*()_+ ";
        $this->tests[3] = "test123\r\n\r\n";
        $this->tests[4] = "1,2,3\n\n";
        $this->tests[5] = "get_5_user.json";
    }

    /**
     * Check the default workmode
     */
    public function testDefault()
    {
        $this->assertTrue(Cleaner::run($this->tests[1]) == "data");
        $this->assertTrue(Cleaner::run($this->tests[2]) == "~!@#$%^&amp;*()_+ ");
        $this->assertTrue(Cleaner::run($this->tests[3]) == "test123<br/>");
        $this->assertTrue(Cleaner::run($this->tests[4]) == "1,2,3<br/>");
        $this->assertTrue(Cleaner::run($this->tests[5]) == "get_5_user.json");
    }

    public function testNum()
    {
        $this->assertTrue(Cleaner::run($this->tests[1], 'num') == "");
        $this->assertTrue(Cleaner::run($this->tests[2], 'num') == "");
        $this->assertTrue(Cleaner::run($this->tests[3], 'num') == "123");
        $this->assertTrue(Cleaner::run($this->tests[4], 'num') == "123");
        $this->assertTrue(Cleaner::run($this->tests[5], 'num') == "5");
    }

    public function testNumex()
    {
        $this->assertTrue(Cleaner::run($this->tests[1], 'numex') == "");
        $this->assertTrue(Cleaner::run($this->tests[2], 'numex') == "");
        $this->assertTrue(Cleaner::run($this->tests[3], 'numex') == "123");
        $this->assertTrue(Cleaner::run($this->tests[4], 'numex') == "1,2,3");
        $this->assertTrue(Cleaner::run($this->tests[5], 'numex') == "5");
    }

    public function testText()
    {
        $this->assertTrue(Cleaner::run($this->tests[1], 'text') == "data");
        $this->assertTrue(Cleaner::run($this->tests[2], 'text') == "amp");
        $this->assertTrue(Cleaner::run($this->tests[3], 'text') == "testbr");
        $this->assertTrue(Cleaner::run($this->tests[4], 'text') == "br");
        $this->assertTrue(Cleaner::run($this->tests[5], 'text') == "getuserjson");
    }

    public function testAPI()
    {
        $this->assertTrue(Cleaner::run($this->tests[1], 'api') == "data");
        $this->assertTrue(Cleaner::run($this->tests[2], 'api') == "amp_");
        $this->assertTrue(Cleaner::run($this->tests[3], 'api') == "test123br");
        $this->assertTrue(Cleaner::run($this->tests[4], 'api') == "123br");
        $this->assertTrue(Cleaner::run($this->tests[5], 'api') == "get_5_user.json");
    }

    public function testFilename()
    {
        $this->assertTrue(Cleaner::run($this->tests[1], 'filename') == "data");
        $this->assertTrue(Cleaner::run($this->tests[2], 'filename') == "!amp()_+");
        $this->assertTrue(Cleaner::run($this->tests[3], 'filename') == "test123br");
        $this->assertTrue(Cleaner::run($this->tests[4], 'filename') == "1,2,3br");
        $this->assertTrue(Cleaner::run($this->tests[5], 'filename') == "get_5_user.json");
    }

    public function testJSON()
    {
        $this->assertTrue(Cleaner::run($this->tests[1], 'json') == "data");
        $this->assertTrue(Cleaner::run($this->tests[2], 'json') == "~!@#$%^&amp;*()_+ ");
        $this->assertTrue(Cleaner::run($this->tests[3], 'json') == "test123<br/>");
        $this->assertTrue(Cleaner::run($this->tests[4], 'json') == "1,2,3<br/>");
        $this->assertTrue(Cleaner::run($this->tests[5], 'json') == "get_5_user.json");
    }
}
