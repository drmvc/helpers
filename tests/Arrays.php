<?php
require_once(__DIR__ . '/../src/Arrays.php');

use PHPUnit\Framework\TestCase;
use DrMVC\Helpers\Arrays;

class ArraysTest extends TestCase
{
    public $array;
    public $dir;
    public $dir_array;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->array[1] = array('k1' => 'v1', 'k2' => 'v2');
        $this->array[2] = array('k2' => 'v2', 'k1' => 'v1');
        $this->array[3] = array('k1' => 'v1', 'k3' => 'v3');

        $this->dir = __DIR__ . '/dir4tests';
        $this->dir_array = array(
            'dummy.txt',
            'subdirectory1' => array(
                'dummy1.txt',
                'dummy2.txt'
            ),
            'subdirectory2' => array(
                'dummy.txt',
                'subdirectory3' => array(
                    'dummynator.txt'
                )
            )
        );
    }

    public function testIsMDArray()
    {
        $this->assertTrue(Arrays::is_md_array($this->array));
        $this->assertFalse(Arrays::is_md_array($this->array[1]));
    }

    public function testArrayEqual()
    {
        $this->assertTrue(Arrays::array_equal($this->array[1], $this->array[1]));
        $this->assertTrue(Arrays::array_equal($this->array[1], $this->array[2]));
        $this->assertFalse(Arrays::array_equal($this->array[1], $this->array[3]));
    }

    public function testDirToArray()
    {
        $files = Arrays::dir_to_array($this->dir);
        $files_tree = print_r($files, true);
        $dir_tree = print_r($this->dir_array, true);
        $dir_tree2 = print_r($this->dir_array['subdirectory2'], true);

        $this->assertTrue($files_tree == $dir_tree);
        $this->assertFalse($files_tree == $dir_tree2);
    }

    public function testMDSearch()
    {
        $result1 = Arrays::md_search($this->array, $this->array[3], false);
        $result2 = Arrays::md_search($this->array, array('some' => 'value'), false);
        error_log($result2);
        $this->assertTrue($result1[0] == 3);
        $this->assertFalse($result2);
    }
}
