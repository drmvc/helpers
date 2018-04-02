<?php

namespace DrMVC\Helpers\Tests;

use PHPUnit\Framework\TestCase;
use DrMVC\Helpers\Validators;

class ValidatorsTest extends TestCase
{
    private $mac_true;
    private $mac_false;
    private $email_valid;
    private $email_invalid;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mac_true = 'aa:bb:cc:dd:ee:ff';
        $this->mac_false = 'mac-address';
        $this->email_valid = 'test@mail.com';
        $this->email_invalid = 'z test@mail.com';
    }

    public function testMAC()
    {
        $this->assertTrue(Validators::isValidMAC($this->mac_true));
        $this->assertFalse(Validators::isValidMAC($this->mac_false));
    }

    public function testUrl()
    {
        $this->assertTrue(Validators::isValidURL('http://example.com'));
        $this->assertFalse(Validators::isValidURL('http:/example.com'));

        $this->assertTrue(Validators::isValidURL('http://example.com/some_query', true));
        $this->assertFalse(Validators::isValidURL('http:/example.com', true));
        $this->assertFalse(Validators::isValidURL('http:/example.com', true));
    }

    public function testEmail()
    {
        $this->assertTrue(Validators::isValidEmail($this->email_valid ));
        $this->assertTrue(Validators::isValidEmail($this->email_invalid));

        $this->assertTrue(Validators::isValidEmail($this->email_valid, false));
        $this->assertFalse(Validators::isValidEmail($this->email_invalid, false));
    }

}
