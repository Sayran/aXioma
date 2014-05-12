<?php

namespace App;

/**
 * Class Router
 * @package App
 */
class Router
{
    public function dispatch()
    {
        $action = 'indexAction';
        $controller = 'MainController';

        $path = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($path[1]) && empty($path[2])) {
            $controller = ucfirst($path[1]) . 'Controller';
        } elseif (!empty($path[1]) && !empty($path[2])) {
            $controller = ucfirst($path[1]) . 'Controller';
            $action = lcfirst($path[2]) . 'Action';
        }


        $controller = 'Controller\\' . $controller;

        if (class_exists($controller) && method_exists($controller, $action)) {

            $request = new Request();

            $controller = new $controller();
            $controller->$action($request);
        } else {
            header("HTTP/1.0 404 Not Found");
            exit(sprintf('<b>%s</b> class or <b>%s</b> method not found.', $controller, $action));
        }

    }
}