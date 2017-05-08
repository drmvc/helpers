<?php namespace DrMVC\Helpers;
include __DIR__ . "/../src/GeoPosition.php";

use PHPUnit\Framework\TestCase;

class GeoPositionTest extends TestCase
{
    public $coordinates;
    public $degrees;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        // Generate coordinates
        $this->coordinates = GeoPosition::randomCoordinates(10, 1);

        // Array of degrees
        $this->degrees = array(1, 10, 50, 100, 200, 250, 270, 300, 310, 350);
    }

    public function testRadians()
    {
        foreach ($this->degrees as $degree) {
            $normal = (string)deg2rad($degree);
            $custom = (string)GeoPosition::radians($degree);

            $this->assertTrue($normal == $custom);
        }
    }

    public function testCoordinatesRandom()
    {
        foreach ($this->coordinates as $coordinates) {
            // Result should one at least
            $result = GeoPosition::getCoordinatesWithinRadius($this->coordinates, $coordinates, 100);

            $this->assertTrue(count($result) > 0);
        }
    }
}
