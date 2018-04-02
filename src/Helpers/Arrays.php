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
    public static function isMulti(array $array): bool
    {
        // If some element is array then $array is multidimensional
        foreach ($array as $value) {
            if (\is_array($value)) {
                return true;
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
        // Elements count should be equal
        $count_equal = (\count($a) === \count($b));
        // Between the keys should not be differences
        $difference = (array_diff($a, $b) === array_diff($b, $a));

        return ($count_equal && $difference);
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
     * Make search in MD object
     *
     * @param   object $multi
     * @param   array $target
     * @return  array
     */
    private static function searchMdObject($multi, array $target): array
    {
        return array_map(
            function($element) use ($target) {
                $exist = true;
                foreach ($target as $skey => $svalue) {
                    $exist = $exist && isset($element->$skey) && ($element->$skey === $svalue);
                }
                return $exist ? $element : null;
            },
            (array) $multi
        );
    }

    /**
     * Make search in MD array
     *
     * @param   array $multi
     * @param   array $target
     * @return  array
     */
    private static function searchMdArray(array $multi, array $target): array
    {
        return array_map(
            function($element) use ($target) {
                $exist = true;
                foreach ($target as $skey => $svalue) {
                    $exist = $exist && isset($element[$skey]) && ($element[$skey] === $svalue);
                }
                return $exist ? $element : null;
            },
            $multi
        );
    }

    /**
     * Find nested array inside two-dimensional array
     *
     * @param   array|object $multi where need to make search
     * @param   array $target what we want to find
     * @return  bool|array
     */
    public static function searchMd($multi, $target)
    {
        if (empty($target) || empty($multi)) {
            return false;
        }

        $output = \is_object($multi)
            ? self::searchMdObject($multi, $target)
            : self::searchMdArray($multi, $target);

        $output = array_values(array_filter($output));

        // If output is not empty, false by default
        return !empty($output) ? $output : false;
    }

}
