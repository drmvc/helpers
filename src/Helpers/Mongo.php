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
     * Cleanup result of query
     * @param object $array
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
