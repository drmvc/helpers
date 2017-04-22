<?php namespace DrMVC\Helpers;
include __DIR__ . "/../src/UUID.php";

use PHPUnit\Framework\TestCase;

class UUIDTest extends TestCase
{
    public function testV3()
    {
        $uuid = UUID::v3(UUID::v4(), 'test');
        $this->assertTrue(UUID::is_valid($uuid));
    }

    public function testV4()
    {
        $uuid = UUID::v4();
        $this->assertTrue(UUID::is_valid($uuid));
    }

    public function testV5()
    {
        $uuid = UUID::v5(UUID::v4(), 'test');
        $this->assertTrue(UUID::is_valid($uuid));
    }

    public function testValid()
    {
        $test = 'test';
        $this->assertFalse(UUID::is_valid($test));
        $this->assertTrue(UUID::is_valid(UUID::v4()));
    }
}
