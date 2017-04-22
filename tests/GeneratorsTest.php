<?php namespace DrMVC\Helpers;
include __DIR__ . "/../src/Generators.php";

use PHPUnit\Framework\TestCase;

class GeneratorsTest extends TestCase
{
    public function testGravatar()
    {
        $img_url = Generators::gravatar('test@mail.com');
        $img_tag = Generators::gravatar('test@mail.com','80','mm','g',true);

        $this->assertTrue(Validators::is_valid_url($img_url));
        $this->assertFalse(Validators::is_valid_url($img_tag));
    }

}
