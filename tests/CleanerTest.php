<?php

namespace DrMVC\Helpers\Tests;

use PHPUnit\Framework\TestCase;
use DrMVC\Helpers\Cleaner;

class CleanerTest extends TestCase
{
    private $tests;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        /*
         * Default tests
         */
        $this->tests[1] = 'data';
        $this->tests[2] = '~!@#$%^&*()_+ ';
        $this->tests[3] = 'test123\r\n\r\n';
        $this->tests[4] = '1,2,3\n\n';
        $this->tests[5] = 'get_5_user.json';
    }

    public function testDefault()
    {
        $this->assertEquals(Cleaner::run($this->tests[1]), 'data');
        $this->assertEquals(Cleaner::run($this->tests[2]), '~!@#$%^&amp;*()_+ ');
        $this->assertEquals(Cleaner::run($this->tests[3]), 'test123<br/>');
        $this->assertEquals(Cleaner::run($this->tests[4]), '1,2,3<br/>');
        $this->assertEquals(Cleaner::run($this->tests[5]), 'get_5_user.json');
    }

    public function testNum()
    {
        $this->assertEquals(Cleaner::run($this->tests[1], 'num'), '');
        $this->assertEquals(Cleaner::run($this->tests[2], 'num'), '');
        $this->assertEquals(Cleaner::run($this->tests[3], 'num'), '123');
        $this->assertEquals(Cleaner::run($this->tests[4], 'num'), '123');
        $this->assertEquals(Cleaner::run($this->tests[5], 'num'), '5');
    }

    public function testNumex()
    {
        $this->assertEquals(Cleaner::run($this->tests[1], 'numex'), '');
        $this->assertEquals(Cleaner::run($this->tests[2], 'numex'), '');
        $this->assertEquals(Cleaner::run($this->tests[3], 'numex'), '123');
        $this->assertEquals(Cleaner::run($this->tests[4], 'numex'), '1,2,3');
        $this->assertEquals(Cleaner::run($this->tests[5], 'numex'), '5');
    }

    public function testText()
    {
        $this->assertEquals(Cleaner::run($this->tests[1], 'text'), 'data');
        $this->assertEquals(Cleaner::run($this->tests[2], 'text'), 'amp');
        $this->assertEquals(Cleaner::run($this->tests[3], 'text'), 'testbr');
        $this->assertEquals(Cleaner::run($this->tests[4], 'text'), 'br');
        $this->assertEquals(Cleaner::run($this->tests[5], 'text'), 'getuserjson');
    }

    public function testAPI()
    {
        $this->assertEquals(Cleaner::run($this->tests[1], 'api'), 'data');
        $this->assertEquals(Cleaner::run($this->tests[2], 'api'), 'amp_');
        $this->assertEquals(Cleaner::run($this->tests[3], 'api'), 'test123br');
        $this->assertEquals(Cleaner::run($this->tests[4], 'api'), '123br');
        $this->assertEquals(Cleaner::run($this->tests[5], 'api'), 'get_5_user.json');
    }

    public function testFilename()
    {
        $this->assertEquals(Cleaner::run($this->tests[1], 'filename'), 'data');
        $this->assertEquals(Cleaner::run($this->tests[2], 'filename'), '!amp()_+');
        $this->assertEquals(Cleaner::run($this->tests[3], 'filename'), 'test123br');
        $this->assertEquals(Cleaner::run($this->tests[4], 'filename'), '1,2,3br');
        $this->assertEquals(Cleaner::run($this->tests[5], 'filename'), 'get_5_user.json');
    }

    public function testJSON()
    {
        $this->assertEquals(Cleaner::run($this->tests[1], 'json'), 'data');
        $this->assertEquals(Cleaner::run($this->tests[2], 'json'), '~!@#$%^&amp;*()_+ ');
        $this->assertEquals(Cleaner::run($this->tests[3], 'json'), 'test123<br/>');
        $this->assertEquals(Cleaner::run($this->tests[4], 'json'), '1,2,3<br/>');
        $this->assertEquals(Cleaner::run($this->tests[5], 'json'), 'get_5_user.json');
    }
}
