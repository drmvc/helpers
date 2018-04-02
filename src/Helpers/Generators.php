<?php

namespace DrMVC\Helpers;

class Generators
{

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     * @source https://gravatar.com/site/implement/images/php/
     *
     * @param   string $email The email address
     * @param   int $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param   string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param   string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param   bool $img True to return a complete IMG tag False for just the URL
     * @param   array $attrs Optional, additional key/value attributes to include in the IMG tag
     * @return  string containing either just a URL or a complete image tag
     */
    public static function gravatar(
        string $email,
        int $s = 80,
        string $d = 'mm',
        string $r = 'g',
        bool $img = false,
        array $attrs = []
    ) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($email)));
        $url .= "?s=$s&d=$d&r=$r";
        if ($img) {
            $url = '<img src="' . $url . '"';
            foreach ($attrs as $key => $val) {
                $url .= ' ' . $key . '="' . $val . '"';
            }
            $url .= ' />';
        }
        return $url;
    }

    /**
     * Generate correct url from string (UTF-8 supported)
     *
     * @param   string $slug
     * @return  string
     */
    public static function slug(string $slug): string
    {
        $lettersNumbersSpacesHyphens = '/[^\-\s\pN\pL]+/u';
        $spacesDuplicateHypens = '/[\-\s]+/';

        $slug = preg_replace($lettersNumbersSpacesHyphens, '', $slug);
        $slug = preg_replace($spacesDuplicateHypens, '-', $slug);

        $slug = trim($slug, '-');

        return mb_strtolower($slug, 'UTF-8');
    }

}
