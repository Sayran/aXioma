<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

define('LIB_DIR', __DIR__ . '/src/');
define('APP_DIR', __DIR__ . '/app/');
define('CONFIG_FILE', __DIR__ . '/config/app.ini');
define('VIEW_DIR', __DIR__ . '/views/');

function __autoload($className)
{
    $className = ltrim($className, '\\');

    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = LIB_DIR . str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    } else {
        $fileName = LIB_DIR . 'Controller/';
    }

    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    if (file_exists($fileName)) {
        require_once($fileName);
    } else {
        return false;
    }
}

$router = new \App\Router();
$router->dispatch();

