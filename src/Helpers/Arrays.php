<?php

namespace DrMVC\Helpers;

/**
 * Class Arrays
 * @package DrMVC\Helpers
 */
class Arrays
{
    /**
     * Order array by arguments
     *
     * @return  array
     */
    public static function orderBy(): array
    {
        $args = \func_get_args();
        $data = array_shift($args);
        foreach ($args as $n => $field) {
            if (\is_string($field)) {
                $tmp = [];
                foreach ($data as $key => $row) {
                    $tmp[$key] = $row[$field];
                }
                $args[$n] = $tmp;
            }
        }
        $args[] = &$data;
        array_multisort($args);
        return array_pop($args);
    }

    /**
     * Check if array is multidimensional
     *
     * @param   array $array
     * @return  bool
     */
    public static function isMulti($array): bool
    {
        // First we need know what value is array
        if (\is_array($array)) {
            // And if some element is array then $array is multidimensional
            foreach ($array as $value) {
                if (\is_array($value)) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Check if two arrays is equal, with same keys
     *
     * @param   array $a
     * @param   array $b
     * @return  bool
     */
    public static function equal(array $a, array $b): bool
    {
        // Both arrays should be... arrays
        $is_arrays = (\is_array($a) && \is_array($b));
        // Elements count should be equal
        $count_equal = (\count($a) === \count($b));
        // Between the keys should not be differences
        $difference = (array_diff($a, $b) === array_diff($b, $a));

        return ($is_arrays && $count_equal && $difference);
    }

    /**
     * Read any files and folder into some directory
     *
     * @param   string $path - Source directory with files
     * @return  array
     */
    public static function dirToArr($path): array
    {
        $result = [];
        $dirContent = scandir($path, null);

        foreach ($dirContent as $key => $value) {
            // Exclude system dots folders
            if (!\in_array($value, ['.', '..'])) {
                if (is_dir($path . DIRECTORY_SEPARATOR . $value)) {
                    $result[$value] = self::dirToArr($path . DIRECTORY_SEPARATOR . $value);
                } else {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }

    /**
     * Find nested array inside two-dimensional array
     *
     * @param array|object $multidimensional - Where need to find
     * @param array|object $target - What we need to find
     * @param bool $isObject - Method work mode, if object then true, if array then false
     * @return bool|array
     */
    public static function searchMd($multidimensional, $target, $isObject = true)
    {
        if (empty($target) || empty($multidimensional)) {
            return false;
        }

        $output = array_map(
            function($element) use ($target, $isObject) {
                $exist = true;
                foreach ($target as $skey => $svalue) {
                    $exist = $isObject
                        ? ($exist && isset($element->$skey) && ($element->$skey === $svalue))
                        : ($exist && isset($element[$skey]) && ($element[$skey] === $svalue));
                }
                return $exist ? $element : null;
            },
            $multidimensional
        );

        // If output is not empty, false by default
        return !empty($output) ? array_filter($output) : false;
    }

}
