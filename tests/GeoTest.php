<?php

namespace DrMVC\Helpers\Tests;

use PHPUnit\Framework\TestCase;
use DrMVC\Helpers\Geo;

class GeoTest extends TestCase
{
    public function testRadians()
    {
        $degrees = [1, 10, 50, 100, 200, 250, 270, 300, 310, 350];
        foreach ($degrees as $degree) {
            $normal = (string) deg2rad($degree);
            $custom = (string) Geo::radians($degree);

            $this->assertSame($normal, $custom);
        }
    }

    public function testRandomCoordinates()
    {
        $random = Geo::randomCoordinates(100);
        $this->assertCount(2, $random);
    }

    public function testRandomCoordinatesArray()
    {
        $random = Geo::randomCoordinatesArray(10, 1);
        $this->assertCount(10, $random);
        $this->assertCount(2, $random[9]);
    }

    public function testIsCoordinatesInRadius()
    {
        $coordinates = [47, 47];
        $center1 = [47, 47];
        $center2 = [57, 57];
        $this->assertTrue(Geo::isCoordinatesInRadius($coordinates, $center1, 100));
        $this->assertFalse(Geo::isCoordinatesInRadius($coordinates, $center2, 100));
    }

    public function testGetCoordinatesWithinRadius()
    {
        $coordinates = [[47, 47], [57, 57]];
        $center = [47, 47];
        $result = Geo::getCoordinatesWithinRadius($coordinates, $center, 100);

        $this->assertSame($result[0], $coordinates[0]);
    }
}
