<?php

namespace Controller;

use App\ViewHelper;

class BaseController
{

    protected function redirect($url)
    {
        header('Location: ' . $url);
    }

    protected function render($view, $params)
    {
        ViewHelper::includeTemplate($view, $params);
    }
}