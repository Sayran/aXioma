<?php

namespace App;

/**
 * Class Request
 * @package App
 */
class Request
{
    /**
     * @param $key
     * @param null $default
     * @return null|string
     */
    public function getParameter($key, $default = null)
    {
        return array_key_exists($key, $_REQUEST) ? $this->cleanData($_REQUEST[$key]) : $default;
    }

    /**
     * @param $key
     * @param null $default
     * @return null|string
     */
    public function getPostParameter($key, $default = null)
    {
        return array_key_exists($key, $_REQUEST) ? $this->cleanData($_REQUEST[$key]) : $default;
    }

    /**
     * @param $key
     * @param null $default
     * @return null|string
     */
    public function getGetParameter($key, $default = null)
    {
        return array_key_exists($key, $_REQUEST) ? $this->cleanData($_REQUEST[$key]) : $default;
    }

    /**
     * @return mixed
     */
    public function getCurrentUrl()
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * @param $param
     * @return string
     */
    private function cleanData($param)
    {
        return trim(strip_tags($param));
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return bool
     */
    public function isAjaxRequest()
    {
        return $_SERVER['HTTP_X_REQUESTED_WITH'] == 'xmlhttprequest';
    }

}