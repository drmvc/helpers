<?php namespace DrMVC\Helpers;

class Arrays
{

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
