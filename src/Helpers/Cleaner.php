<?php

namespace DrMVC\Helpers;

/**
 * Class Cleaner
 * @package DrMVC\Helpers
 */
class Cleaner
{

    const INT = '0-9';
    const FLOAT = self::INT . '\,\.';
    const CHARS_RUS = 'а-яё';
    const CHARS_ENG = 'a-z';
    const SUPER = '\*\#\ \n\r';

    private static function fixQuotes($value): string
    {
        return htmlspecialchars(addslashes($value), ENT_QUOTES);
    }

    private static function compileRegexp($line): string
    {
        return '#[^' . $line . ']#iu';
    }

    /**
     * Cleanup the value
     *
     * @param   string $value
     * @param   string $type
     * @return  mixed
     */
    public static function run(string $value, string $type = null)
    {
        switch ($type) {
            case 'int':
                $regexp = self::compileRegexp(self::INT);
                break;
            case 'float':
                $regexp = self::compileRegexp(self::FLOAT);
                break;
            case 'text':
                $value = self::fixQuotes($value);
                $regexp = self::compileRegexp(self::CHARS_RUS . self::CHARS_ENG);
                break;
            default:
                $value = self::fixQuotes($value);
                $regexp = self::compileRegexp(
                    self::CHARS_RUS . self::CHARS_ENG . self::FLOAT .
                    '—~`@%[]/:<>;?&()_!$^-+=' . self::SUPER
                );
                break;
        }

        return preg_replace($regexp, '', $value);
    }

}
