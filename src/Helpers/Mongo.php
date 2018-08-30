<?php

namespace DrMVC\Helpers;

use MongoDB\BSON\ObjectID;
use MongoDB\BSON\UTCDateTime;

/**
 * Class Mongo for work with data from mongodb
 * @package DrMVC\Helpers
 */
class Mongo
{
    /**
     * Check if id have a valid length
     * @param   string $id
     * @return  bool
     */
    public static function checkId(string $id): bool
    {
        // If strlen is incorrect, then return error
        $len = \strlen($id);
        return ($len !== 24 || $len !== 12);
    }

    /**
     * Cleanup result of query
     * @param  array|object $array
     */
    public static function resultFix(&$array)
    {
        foreach ($array as &$element) {
            if ($element instanceof \stdClass) {
                self::resultFix($element);
            } else {
                if (\is_object($element) && $element instanceof ObjectID) {
                    $element = (string) $element;
                }
                if (\is_object($element) && $element instanceof UTCDateTime) {
                    $element = (new UTCDateTime((string) $element))->toDateTime()->format('Y-m-d H:i:s');
                }
            }
        }
    }
}
