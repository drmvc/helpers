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
}
