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

        $this->tests = [
            'data',
            '~!@#$%^&*()_+ ',
            'test123\r\n\r\n',
            '1,2,3\n\n',
            'get_5_user.json'
        ];
    }

    public function testInt()
    {
        $this->assertEquals(Cleaner::run($this->tests[0], 'int'), '');
        $this->assertEquals(Cleaner::run($this->tests[1], 'int'), '');
        $this->assertEquals(Cleaner::run($this->tests[2], 'int'), '123');
        $this->assertEquals(Cleaner::run($this->tests[3], 'int'), '123');
        $this->assertEquals(Cleaner::run($this->tests[4], 'int'), '5');
    }

    public function testFloat()
    {
        $this->assertEquals(Cleaner::run($this->tests[0], 'float'), '');
        $this->assertEquals(Cleaner::run($this->tests[1], 'float'), '');
        $this->assertEquals(Cleaner::run($this->tests[2], 'float'), '123');
        $this->assertEquals(Cleaner::run($this->tests[3], 'float'), '1,2,3');
        $this->assertEquals(Cleaner::run($this->tests[4], 'float'), '5');
    }

    public function testText()
    {
        $this->assertEquals(Cleaner::run($this->tests[0], 'text'), 'data');
        $this->assertEquals(Cleaner::run($this->tests[1], 'text'), 'amp');
        $this->assertEquals(Cleaner::run($this->tests[2], 'text'), 'testrnrn');
        $this->assertEquals(Cleaner::run($this->tests[3], 'text'), 'nn');
        $this->assertEquals(Cleaner::run($this->tests[4], 'text'), 'getuserjson');
    }

    public function testDefault()
    {
        $this->assertEquals(Cleaner::run($this->tests[0]), 'data');
        $this->assertEquals(Cleaner::run($this->tests[1]), '~!@#$%^&amp;*()_+ ');
        $this->assertEquals(Cleaner::run($this->tests[2]), 'test123\\\\r\\\\n\\\\r\\\\n');
        $this->assertEquals(Cleaner::run($this->tests[3]), '1,2,3\\\\n\\\\n');
        $this->assertEquals(Cleaner::run($this->tests[4]), 'get_5_user.json');
    }

}
