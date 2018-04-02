<?php

namespace DrMVC\Helpers;

/**
 * Class Validators
 * @package DrMVC\Helpers
 */
class Validators
{
    /**
     * Regular expression for MAC tests
     */
    const REGEXP_MAC = '/^([a-fA-F0-9]{2}[-:]){5}[0-9A-Fa-f]{2}|([0-9A-Fa-f]{4}\.){2}[0-9A-Fa-f]{4}/i';

    /**
     * Regular expression for UUID tests
     */
    const REGEXP_UUID = '/^\{?[0-9a-f]{8}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?[0-9a-f]{12}\}?$/i';

    /**
     * Check if MAC-address is valid
     *
     * @param   string $mac mac-address for check
     * @return  bool
     */
    public static function isValidMAC(string $mac): bool
    {
        return preg_match(self::REGEXP_MAC, $mac) === 1;
    }

    /**
     * Check if URL is valid
     *
     * @param   string $url
     * @param   bool $query
     * @return  bool
     */
    public static function isValidURL(string $url, bool $query = false): bool
    {
        if (
            true === $query &&
            !filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false
        ) {
            return true;
        }

        if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
            return true;
        }

        return false;
    }

    /**
     * Simple email validation
     *
     * @param   string $email
     * @param   bool $sanitize enable email sanitize filter
     * @return  bool
     */
    public static function isValidEmail(string $email, bool $sanitize = true): bool
    {
        // Remove all illegal characters from email
        if (true === $sanitize) {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        }
        return !filter_var($email, FILTER_VALIDATE_EMAIL) === false;
    }

    /**
     * Check if UUID is valid
     *
     * @param   string $uuid
     * @return  bool
     */
    public static function isValidUUID(string $uuid): bool
    {
        return preg_match(self::REGEXP_UUID, $uuid) === 1;
    }

}
