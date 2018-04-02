<?php

namespace DrMVC\Helpers\Tests;

use PHPUnit\Framework\TestCase;
use DrMVC\Helpers\Arrays;

class ArraysTest extends TestCase
{
    public $array;
    public $array_keys;
    public $dir;
    public $dir_array;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->array_keys = [
            ['title' => 'lemon', 'count' => 4],
            ['title' => 'orange', 'count' => 2],
            ['title' => 'banana', 'count' => 9],
            ['title' => 'apple', 'count' => 5]
        ];

        $this->array[1] = ['k1' => 'v1', 'k2' => 'v2'];
        $this->array[2] = ['k2' => 'v2', 'k1' => 'v1'];
        $this->array[3] = ['k1' => 'v1', 'k3' => 'v3'];

        $this->dir = __DIR__ . '/dir4tests';
        $this->dir_array = [
            'dummy.txt',
            'subdirectory1' => [
                'dummy1.txt',
                'dummy2.txt'
            ],
            'subdirectory2' => [
                'dummy.txt',
                'subdirectory3' => [
                    'dummynator.txt'
                ]
            ]
        ];
    }

    public function testIsMDArray()
    {
        $this->assertTrue(Arrays::isMulti($this->array));
        $this->assertFalse(Arrays::isMulti($this->array[1]));
    }

    public function testArrayEqual()
    {
        $this->assertTrue(Arrays::equal($this->array[1], $this->array[1]));
        $this->assertTrue(Arrays::equal($this->array[1], $this->array[2]));
        $this->assertFalse(Arrays::equal($this->array[1], $this->array[3]));
    }

    public function testSortByKey()
    {
        $out[1]['asc'] = Arrays::orderBy($this->array_keys, 'title', SORT_ASC);
        $out[1]['desc'] = Arrays::orderBy($this->array_keys, 'title', SORT_DESC);
        $out[2]['asc'] = Arrays::orderBy($this->array_keys, 'count', SORT_ASC);
        $out[2]['desc'] = Arrays::orderBy($this->array_keys, 'count', SORT_DESC);

        $this->assertSame(print_r($out[1]['asc'], true), print_r($this->array_keys, true));
        $this->assertSame(print_r($out[1]['desc'], true), print_r($this->array_keys, true));
        $this->assertSame(print_r($out[2]['asc'], true), print_r($this->array_keys, true));
        $this->assertSame(print_r($out[2]['desc'], true), print_r($this->array_keys, true));
    }

    public function testDirToArray()
    {
        $files = Arrays::dirToArr($this->dir);
        $files_tree = print_r($files, true);
        $dir_tree = print_r($this->dir_array, true);
        $dir_tree2 = print_r($this->dir_array['subdirectory2'], true);

        $this->assertSame($files_tree, $dir_tree);
        $this->assertNotSame($files_tree, $dir_tree2);
    }

    public function testSearchMd()
    {
        $result1 = Arrays::searchMd($this->array, $this->array[3], false);
        $result2 = Arrays::searchMd($this->array, ['some' => 'value'], false);

        $this->assertCount(2, $result1[0]);
        $this->assertFalse($result2);
    }
}
