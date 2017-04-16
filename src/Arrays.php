<?php namespace DrMVC\Helpers;

class Arrays
{

    /**
     * Check if array is multidimensional
     *
     * @param array $array
     * @return bool
     */
    static function is_md_array($array)
    {
        // First we need know what value is array
        if (is_array($array))
            // Next read cols from array
            foreach ($array as $value)
                // And if some element is array then $array is multidimensional
                if (is_array($value))
                    return true;

        return false;
    }

    /**
     * Check if two arrays is equal, with same keys
     *
     * @param array $a
     * @param array $b
     * @return bool
     */
    static function array_equal($a, $b)
    {
        // Both arrays should be... arrays
        $is_arrays = (is_array($a) && is_array($b));
        // Elements count should be equal
        $count_equal = (count($a) == count($b));
        // Between the keys should not be differences
        $difference = (array_diff($a, $b) === array_diff($b, $a));

        return ($is_arrays && $count_equal && $difference);
    }

    /**
     * Read any files and folder into some directory
     *
     * @param string $path - Source directory with files
     * @return array
     */
    static function dir_to_array($path)
    {
        $result = array();
        $dirContent = scandir($path);

        foreach ($dirContent as $key => $value) {
            if (!in_array($value, array(".", ".."))) {
                if (is_dir($path . DIRECTORY_SEPARATOR . $value)) $result[$value] = self::dir_to_array($path . DIRECTORY_SEPARATOR . $value);
                else $result[] = $value;
            }
        }

        return $result;
    }

    /**
     * Find nested array inside two-dimensional array
     *
     * @param array|object $multidimensional - Where need to find
     * @param array|object $target - What we need to find
     * @param bool $object - Method work mode, if object then true, if array then false
     * @return bool|array
     */
    static function md_search($multidimensional, $target, $object = true)
    {
        if (empty($target) || empty($multidimensional)) return false;

        // Default state for output value
        $for_out = array();

        // Parse the $multidimensional array by keys and values
        foreach ($multidimensional as $key => $value) {
            //error_log($key);
            //error_log(print_r($value));
            $exists = true;

            foreach ($target as $skey => $svalue) {
                //error_log($skey . '=>' . $svalue);
                if ($object) $exists = ($exists && isset($value->$skey) && ($value->$skey == $svalue));
                else $exists = ($exists && isset($value[$skey]) && ($value[$skey] == $svalue));
            }

            // Generate array of keys with founded subArrays
            if ($exists) $for_out[] = $key;
        }

        // If output is not empty
        if (!empty($for_out)) return $for_out;

        // False by default
        return false;
    }

}
