<?php

namespace DrMVC\Helpers\Tests;

use PHPUnit\Framework\TestCase;
use DrMVC\Helpers\Geo;

class GeoTest extends TestCase
{
    public $coordinates;
    public $degrees;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        // Generate coordinates
        $this->coordinates = Geo::randomCoordinates(10, 1);

        // Array of degrees
        $this->degrees = array(1, 10, 50, 100, 200, 250, 270, 300, 310, 350);
    }

    public function testRadians()
    {
        foreach ($this->degrees as $degree) {
            $normal = (string) deg2rad($degree);
            $custom = (string) Geo::radians($degree);

            $this->assertSame($normal, $custom);
        }
    }

    public function testCoordinatesRandom()
    {
        foreach ($this->coordinates as $coordinates) {
            // Result should one at least
            $result = Geo::getCoordinatesWithinRadius($this->coordinates, $coordinates, 100);

            $this->assertTrue(\count($result) > 0);
        }
    }
}
