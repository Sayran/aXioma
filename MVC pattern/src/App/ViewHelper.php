<?php

namespace App;

/**
 * Class Router
 * @package App
 */
class ViewHelper
{
    public static function includeTemplate($view, $params = array())
    {
        if (is_array($params) && !empty($params)) {
            extract($params);
        }

        ob_start();
        include(sprintf('%s.%s', VIEW_DIR . $view, Config::getParameter('template.engine.extension', 'php')));
        $content = ob_get_contents();
        ob_end_clean();

        extract(array('content' => $content));
        include_once(sprintf('%slayout.%s', VIEW_DIR, Config::getParameter('template.engine.extension', 'php')));
    }

    public static function includePartial($view, $params = array())
    {
        if (is_array($params) && !empty($params)) {
            extract($params);
        }

        include(sprintf('%s.%s', VIEW_DIR . $view, Config::getParameter('template.engine.extension', 'php')));
    }
}