<?php

namespace DrMVC\Helpers\Tests;

use PHPUnit\Framework\TestCase;
use DrMVC\Helpers\Generators;
use DrMVC\Helpers\Validators;

class GeneratorsTest extends TestCase
{
    public function testGravatar()
    {
        $img_url = Generators::gravatar('test@mail.com');
        $img_tag = Generators::gravatar('test@mail.com','80','mm','g',true);

        $this->assertTrue(Validators::isValidURL($img_url));
        $this->assertFalse(Validators::isValidURL($img_tag));
    }

}
