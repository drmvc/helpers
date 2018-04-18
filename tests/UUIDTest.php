<?php

namespace DrMVC\Helpers\Tests;

use PHPUnit\Framework\TestCase;
use DrMVC\Helpers\UUID;
use DrMVC\Helpers\Validate;

class UUIDTest extends TestCase
{
    public function testV3()
    {
        $uuid = UUID::v3(UUID::v4(), 'test');
        $this->assertTrue(Validate::isValidUUID($uuid));

        $uuid2 = UUID::v3('lol', 'test');
        $this->assertFalse($uuid2);
    }

    public function testV4()
    {
        $uuid = UUID::v4();
        $this->assertTrue(Validate::isValidUUID($uuid));
    }

    public function testV5()
    {
        $uuid = UUID::v5(UUID::v4(), 'test');
        $this->assertTrue(Validate::isValidUUID($uuid));

        $uuid2 = UUID::v5('lol', 'test');
        $this->assertFalse($uuid2);
    }
}
