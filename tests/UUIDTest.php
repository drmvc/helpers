<?php

namespace DrMVC\Helpers\Tests;

use PHPUnit\Framework\TestCase;
use DrMVC\Helpers\UUID;
use DrMVC\Helpers\Validators;

class UUIDTest extends TestCase
{
    public function testV3()
    {
        $uuid = UUID::v3(UUID::v4(), 'test');
        $this->assertTrue(Validators::isValidUUID($uuid));
    }

    public function testV4()
    {
        $uuid = UUID::v4();
        $this->assertTrue(Validators::isValidUUID($uuid));
    }

    public function testV5()
    {
        $uuid = UUID::v5(UUID::v4(), 'test');
        $this->assertTrue(Validators::isValidUUID($uuid));
    }

    public function testValid()
    {
        $test = 'test';
        $this->assertFalse(Validators::isValidUUID($test));
        $this->assertTrue(Validators::isValidUUID(UUID::v4()));
    }
}
