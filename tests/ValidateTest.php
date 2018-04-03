<?php

namespace DrMVC\Helpers\Tests;

use PHPUnit\Framework\TestCase;
use DrMVC\Helpers\Validate;

class ValidateTest extends TestCase
{
    private $mac_true;
    private $mac_false;
    private $email_valid;
    private $email_invalid;
    private $uuid_valid;
    private $uuid_valid2;
    private $uuid_invalid;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mac_true = 'aa:bb:cc:dd:ee:ff';
        $this->mac_false = 'mac-address';
        $this->email_valid = 'test@mail.com';
        $this->email_invalid = 'z test@mail.com';
        $this->uuid_valid = '385778ea-3732-11e8-9e6e-c3b2f9b31a12';
        $this->uuid_valid2 = '385778ea373211e89e6ec3b2f9b31a12';
        $this->uuid_invalid = 'zzz';
    }

    public function testMAC()
    {
        $this->assertTrue(Validate::isValidMAC($this->mac_true));
        $this->assertFalse(Validate::isValidMAC($this->mac_false));
    }

    public function testUrl()
    {
        $this->assertTrue(Validate::isValidURL('http://example.com'));
        $this->assertFalse(Validate::isValidURL('http:/example.com'));

        $this->assertTrue(Validate::isValidURL('http://example.com/some_query', true));
        $this->assertFalse(Validate::isValidURL('http:/example.com', true));
        $this->assertFalse(Validate::isValidURL('http:/example.com', true));
    }

    public function testEmail()
    {
        $this->assertTrue(Validate::isValidEmail($this->email_valid ));
        $this->assertTrue(Validate::isValidEmail($this->email_invalid));

        $this->assertTrue(Validate::isValidEmail($this->email_valid, false));
        $this->assertFalse(Validate::isValidEmail($this->email_invalid, false));
    }

    public function testUuid()
    {
        $this->assertTrue(Validate::isValidUUID($this->uuid_valid));
        $this->assertTrue(Validate::isValidUUID($this->uuid_valid2));
        $this->assertFalse(Validate::isValidUUID($this->uuid_invalid));
    }

}
