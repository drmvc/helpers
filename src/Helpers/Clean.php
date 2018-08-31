<?php

namespace DrMVC\Helpers;

/**
 * Clean variables from bad content
 * @package DrMVC\Helpers
 */
class Clean
{
    const INT = '0-9';
    const FLOAT = self::INT . '\,\.';
    const CHARS_RUS = 'а-яё';
    const CHARS_ENG = 'a-z';
    const SUPER = '\*\#\ \n\r';

    /**
     * Convert quotes to save format
     *
     * @param   string $value
     * @return  string
     */
    private static function fixQuotes(string $value): string
    {
        return htmlspecialchars(addslashes($value), ENT_QUOTES);
    }

    /**
     * Compile regexp from string
     *
     * @param   string $line
     * @return  string
     */
    private static function compileRegexp(string $line): string
    {
        return '#[^' . $line . ']#iu';
    }

    /**
     * Cleanup the value
     *
     * @param   string|int|null $value
     * @param   string $type
     * @return  mixed
     */
    public static function run($value, string $type = null)
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
