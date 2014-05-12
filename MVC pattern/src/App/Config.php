<?php

namespace App;

/**
 * Class Config
 * @package App
 */
class Config
{

    /**
     * @param $key
     * @param null $default
     * @return null
     */
    public static function getParameter($key, $default = null)
    {
        $data = parse_ini_file(CONFIG_FILE);

        if (array_key_exists($key, $data)) {
            return $data[$key];
        } else {
            return $default;
        }
    }
}