<?php

namespace DrMVC\Helpers;

/**
 * Simple geoposition class based on below answer
 * @link http://stackoverflow.com/a/17286519/7977798
 * @package DrMVC\Helpers
 */
class Geo
{
    /**
     * Generate array of random coordinates for tests
     *
     * @param   int $radius In kilometers
     * @return  array
     */
    public static function randomCoordinates(int $radius = 100): array
    {
        $result = [];

        try {
            // Random angle (from 0 bad idea)
            $angle = deg2rad(random_int(1, 359));
            // Random radius (from 0 bad idea)
            $pointRadius = random_int(1, $radius);
            // Result array
            $result = [
                // Latitude
                sin($angle) * $pointRadius,
                // Longitude
                cos($angle) * $pointRadius
            ];
        } catch (\Exception $e) {
            echo $e->getMessage() . "\n";
        }

        return $result;
    }
    /**
     * Generate array of random coordinates for tests
     *
     * @param   int $count  Count of results
     * @param   int $radius In kilometers
     * @return  array
     */
    public static function randomCoordinatesArray($count = 1, int $radius = 100): array
    {
        $result = [];

        // If count is set
        for ($i = 0; $i < $count; $i++) {
            $result[] = self::randomCoordinates($radius);
        }

        return $result;
    }

    /**
     * The length of an arc of a unit circle is numerically equal to
     * the measurement in radians of the angle that it subtends.
     *
     * @link    https://en.wikipedia.org/wiki/Radian
     * @param   string $degree The number needed to calculate radians
     * @return  float|int
     */
    public static function radians($degree)
    {
        return $degree * M_PI / 180;
    }

    /**
     * Return array of coordinates within some radius
     *
     * @param   array     $coordinates Multidimensional array with coordinates for comparing [[latitude,longitude],[latitude,longitude],[latitude,longitude]]
     * @param   array     $center      Array with coordinates of center [latitude,longitude]
     * @param   int|float $radius      In kilometers or meters (1 - km, .1 - 100 meters)
     * @return  array Simple array with LAT,LON coordinates which are within the radius
     */
    public static function getCoordinatesWithinRadius(array $coordinates, array $center, $radius): array
    {
        $resultArray = [];
        foreach ($coordinates as $key => $coordinate) {
            if (self::isCoordinatesInRadius($coordinate, $center, $radius)) {
                $resultArray[$key] = $coordinate;
            }
        }
        return $resultArray;
    }

    /**
     * Check if coordinates is nearby center in radius
     *
     * @param   array     $coordinates Array with coordinates for comparing [latitude,longitude]
     * @param   array     $center      Array with coordinates of center [latitude,longitude]
     * @param   int|float $radius      In kilometers or meters (1 - km, .1 - 100 meters)
     * @return  bool
     */
    public static function isCoordinatesInRadius(array $coordinates, array $center, $radius): bool
    {
        list($lat1, $long1) = $center;
        list($lat2, $long2) = $coordinates;

        $distance = 3959 * acos(cos(self::radians($lat1)) * cos(self::radians($lat2)) * cos(self::radians($long2) - self::radians($long1)) + sin(self::radians($lat1)) * sin(self::radians($lat2)));

        return ($distance <= $radius);
    }
}
