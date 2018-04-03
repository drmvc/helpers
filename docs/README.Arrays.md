# DrMVC\Helpers\Arrays

Manipulation with single and multidimensional arrays.

## How to use 

```php
// Initial data
$array = ['one', 'two', 'three'];
$arrayM1 = [['id' => 0, 'name' => 'one'], ['id' => 1, 'name' => 'two']];
$arrayM2 = [['id' => 1, 'name' => 'two'], ['id' => 0, 'name' => 'one']];
$arrayM3 = [['id' => 0, 'name' => 'one'], ['id' => 2, 'name' => 'three']];
$arrayK = [
    ["title" => "lemon", "count" => 4],
    ["title" => "orange", "count" => 2],
    ["title" => "banana", "count" => 9],
    ["title" => "apple", "count" => 5]
];

// Order some array by key
$sorted = Arrays::orderBy($arrayK, 'title', SORT_ASC);

// Check if array is multidimentional
Arrays::isMulti($array); // false
Arrays::isMulti($arrayM1); // true

// Check if arrays is equal
Arrays::equal($arrayM1, $arrayM2) // true
Arrays::equal($arrayM1, $arrayM3) // false

// Scan folder content to array
$folder = Arrays::dirToArr('/path/to/folder');

// Try to find array inside array
Arrays::searchMd($arrayK, ["title" => "lemon", "count" => 4], false);
```

## More examples

Some other examples of usage you can find [here](../extra).
