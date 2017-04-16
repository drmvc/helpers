<?php
require_once(__DIR__ . '/../src/Validators.php');

use PHPUnit\Framework\TestCase;
use DrMVC\Helpers\Validators;

class ValidatorsTest extends TestCase
{
    private $mac_true;
    private $mac_false;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mac_true = 'aa:bb:cc:dd:ee:ff';
        $this->mac_false= 'mac-address';
    }

    public function testMAC()
    {
        $this->assertTrue(Validators::is_valid_mac($this->mac_true));
        $this->assertFalse(Validators::is_valid_mac($this->mac_false));
    }

}
