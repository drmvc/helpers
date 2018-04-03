# DrMVC\Helpers\Geo

Simple methods for geolocation.

## How to use 

```php
// Generate 10 random coordinates
$random = Geo::randomCoordinates(10, 1);

// Converts the number in degrees to the radian equivalent
$radian = Geo::radians($degree);

// Return array of coordinates within some radius
$result = Geo::getCoordinatesWithinRadius($ref_coordinates, $desired_coordinates, 100);
```

## More examples

Some other examples of usage you can find [here](../extra).
