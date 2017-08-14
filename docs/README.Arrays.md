# \DrMVC\Helpers\Arrays

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

// Check if array is multidimentional
Arrays::is_md($array); // false
Arrays::is_md($arrayM1); // true

// Check if arrays is equal
Arrays::equivalent($arrayM1, $arrayM2) // true
Arrays::equivalent($arrayM1, $arrayM3) // false

// Order some array by key
$sorted = Arrays::order_by($arrayK, 'title', SORT_ASC);

// Scan folder content to array
$folder = Arrays::dir_to_array('/path/to/folder');

// Try to find array inside array
Arrays::md_search($arrayK, ["title" => "lemon", "count" => 4], false);
```

## More examples

Any other examples of work you can find [here](../tests/ArraysTest.php).
