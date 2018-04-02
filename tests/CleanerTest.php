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

    public function testInt()
    {
        $this->assertEquals(Cleaner::run($this->tests[1], 'int'), '');
        $this->assertEquals(Cleaner::run($this->tests[2], 'int'), '');
        $this->assertEquals(Cleaner::run($this->tests[3], 'int'), '123');
        $this->assertEquals(Cleaner::run($this->tests[4], 'int'), '123');
        $this->assertEquals(Cleaner::run($this->tests[5], 'int'), '5');
    }

    public function testFloat()
    {
        $this->assertEquals(Cleaner::run($this->tests[1], 'float'), '');
        $this->assertEquals(Cleaner::run($this->tests[2], 'float'), '');
        $this->assertEquals(Cleaner::run($this->tests[3], 'float'), '123');
        $this->assertEquals(Cleaner::run($this->tests[4], 'float'), '1,2,3');
        $this->assertEquals(Cleaner::run($this->tests[5], 'float'), '5');
    }

    public function testText()
    {
        $this->assertEquals(Cleaner::run($this->tests[1], 'text'), 'data');
        $this->assertEquals(Cleaner::run($this->tests[2], 'text'), 'amp');
        $this->assertEquals(Cleaner::run($this->tests[3], 'text'), 'testbr');
        $this->assertEquals(Cleaner::run($this->tests[4], 'text'), 'br');
        $this->assertEquals(Cleaner::run($this->tests[5], 'text'), 'getuserjson');
    }

    public function testDefault()
    {
        $this->assertEquals(Cleaner::run($this->tests[1]), 'data');
        $this->assertEquals(Cleaner::run($this->tests[2]), '~!@#$%^&amp;*()_+ ');
        $this->assertEquals(Cleaner::run($this->tests[3]), 'test123<br/>');
        $this->assertEquals(Cleaner::run($this->tests[4]), '1,2,3<br/>');
        $this->assertEquals(Cleaner::run($this->tests[5]), 'get_5_user.json');
    }

}
