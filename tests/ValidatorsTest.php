<?php namespace DrMVC\Helpers;
include __DIR__ . "/../src/Validators.php";

use PHPUnit\Framework\TestCase;

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
        $this->mac_false= 'mac-address';
        $this->email_valid = 'test@mail.com';
        $this->email_invalid = 'z test@mail.com';
    }

    public function testMAC()
    {
        $this->assertTrue(Validators::is_valid_mac($this->mac_true));
        $this->assertFalse(Validators::is_valid_mac($this->mac_false));
    }

    public function testUrl()
    {
        $this->assertTrue(Validators::is_valid_url('http://example.com'));
        $this->assertFalse(Validators::is_valid_url('http:/example.com'));

        $this->assertTrue(Validators::is_valid_url('http://example.com/some_query',true));
        $this->assertFalse(Validators::is_valid_url('http:/example.com', true));
        $this->assertFalse(Validators::is_valid_url('http:/example.com', true));
    }

    public function testEmail()
    {
        $this->assertTrue(Validators::is_valid_email($this->email_valid, false));
        $this->assertFalse(Validators::is_valid_email($this->email_invalid, false));

        $this->assertTrue(Validators::is_valid_email($this->email_valid,true));
        $this->assertTrue(Validators::is_valid_email($this->email_invalid,true));
    }

}
