<?php namespace DrMVC\Helpers;

class Arrays
{

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
     * Multidimensional search
     *
     * @param $parents
     * @param $searched
     * @param $object
     * @return bool|int|string
     */
    static function md_search($parents, $searched, $object = true)
    {
        if (empty($searched) || empty($parents)) {
            return false;
        }

        $for_out = null;
        foreach ($parents as $key => $value) {
            $exists = true;

            foreach ($searched as $skey => $svalue) {
                if ($object)
                    $exists = ($exists && isset($value->$skey) && ($value->$skey == $svalue));
                else
                    $exists = ($exists && isset($value[$skey]) && ($value[$skey] == $svalue));
            }

            if ($exists) {
                $for_out[] = $key;
            }
        }
        if (!empty($for_out)) {
            return $for_out;
        } else {
            return false;
        }
    }

}
