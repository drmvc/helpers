<?php namespace DrMVC\Helpers;

class Validators
{

    /**
     * Cleanup the value
     *
     * @param string $mac - MAC address for check
     * @return bool
     */
    public static function is_valid_mac($mac)
    {
        return (preg_match('/([a-fA-F0-9]{2}[-:]){5}[0-9A-Fa-f]{2}|([0-9A-Fa-f]{4}\.){2}[0-9A-Fa-f]{4}/', $mac) == 1);
    }

    /**
     * Check for url for valid
     *
     * @param $url
     * @param bool $query
     * @return bool
     */
    public static function is_valid_url($url, $query = false)
    {
        if (true === $query)
            if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false)
                return true;

        if (!filter_var($url, FILTER_VALIDATE_URL) === false)
            return true;

        return false;
    }

    /**
     * Simple email validation
     *
     * @param string $email
     * @param bool $sanitize Enable email sanitize filter
     * @return bool
     */
    public static function is_valid_email($email, $sanitize = true)
    {
        // Remove all illegal characters from email
        if (true === $sanitize)
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Validate e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false)
            return true;

        return false;
    }
}
