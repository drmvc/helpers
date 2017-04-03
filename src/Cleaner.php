<?php namespace DrMVC\Helpers;

class Cleaner
{

    /**
     * Cleanup the value
     *
     * @param $value
     * @param null $type
     * @return mixed|string
     */
    public static function run($value, $type = NULL)
    {

        switch ($type) {
            case 'num':
                $value = htmlspecialchars(addslashes($value), ENT_QUOTES);
                $value = preg_replace("/[^0-9]/i", "", $value);
                break;
            case 'numex':
                $value = htmlspecialchars(addslashes($value), ENT_QUOTES);
                $value = preg_replace("/[^0-9\,]/i", "", $value);
                break;
            case 'text':
                $value = htmlspecialchars($value, ENT_QUOTES);
                $value = preg_replace(array("/\r\n\r\n/", "/\n\n/"), array("<br/>", "<br/>"), $value);
                $value = preg_replace("/[^а-яёa-z]/iu", "", $value);
                break;
            case 'api':
                $value = htmlspecialchars($value, ENT_QUOTES);
                $value = preg_replace(array("/\r\n\r\n/", "/\n\n/"), array("<br/>", "<br/>"), $value);
                $value = preg_replace("/[^а-яёa-z0-9\-\_\.]/iu", "", $value);
                break;
            case 'filename':
                $value = htmlspecialchars($value, ENT_QUOTES);
                $value = preg_replace(array("/\r\n\r\n/", "/\n\n/"), array("<br/>", "<br/>"), $value);
                $value = preg_replace("/[^а-яёa-z\.\,\_\-\+\=\?\(\)\!0-9]/iu", "", $value);
                break;
            case 'json':
                $value = htmlspecialchars($value, ENT_QUOTES);
                $value = preg_replace(array("/\r\n\r\n/", "/\n\n/"), array("<br/>", "<br/>"), $value);
                $value = preg_replace("/[^а-яёa-z0-9\—\~\`\.\,\@\%\{\}\[\]\/\:\<\>\\\;\?\&\(\)\_\#\!\$\*\^\-\+\=\ \n\r]/iu", "", $value);
                break;
            default:
                $value = htmlspecialchars($value, ENT_QUOTES);
                $value = preg_replace(array("/\r\n\r\n/", "/\n\n/"), array("<br/>", "<br/>"), $value);
                $value = preg_replace("/[^а-яёa-z0-9\—\~\`\.\,\@\%\[\]\/\:\<\>\\\;\?\&\(\)\_\#\!\$\*\^\-\+\=\ \n\r]/iu", "", $value);
                break;
        }

        return $value;
    }

}
