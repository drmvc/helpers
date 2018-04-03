<?php

namespace DrMVC\Helpers\Tests;

use PHPUnit\Framework\TestCase;
use DrMVC\Helpers\Generate;
use DrMVC\Helpers\Validate;

class GenerateTest extends TestCase
{
    public function testGravatar()
    {
        $img_url = Generate::gravatar('test@mail.com');
        $img_tag = Generate::gravatar('test@mail.com','80','mm','g',true);

        $this->assertTrue(Validate::isValidURL($img_url));
        $this->assertFalse(Validate::isValidURL($img_tag));
    }

    public function testSlug()
    {
        $slug = Generate::slug('Ave Some');
        $utf8 = Generate::slug('Коллекция мягких французских булок');

        $this->assertEquals($slug, 'ave-some');
        // check utf8
        $this->assertEquals($utf8, 'коллекция-мягких-французских-булок');
    }
}
