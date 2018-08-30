<?php

namespace DrMVC\Helpers;

/**
 * Class Json for work with JSON objects
 * @package DrMVC\Helpers
 */
class Json
{
    /**
     * Check if input value is valid JSON
     *
     * @param   mixed $input
     * @return  bool
     */
    public static function isJson($input): bool
    {
        $test = json_decode($input);
        return ($test instanceof \stdClass || \is_array($test));
    }
}
