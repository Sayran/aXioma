<?php

// Hi, i am so called FrontController

error_reporting(E_ALL);
ini_set('display_errors', true);

define('CURRENT_DIR', dirname(__FILE__));
define('CONTROLLER_PATH', CURRENT_DIR . '/controllers/');
define('TEMPLATE_PATH', CURRENT_DIR . '/views/');

require_once('news_model.php');

set_include_path(implode(PATH_SEPARATOR, array(CONTROLLER_PATH, TEMPLATE_PATH)));

if (!array_key_exists('action', $_GET)) {
    header("Location: ?action=list");
} else {
    switch ($_GET['action']) {

        case 'add':
            include(CONTROLLER_PATH . 'add.php');
            break;
        case 'edit':
            include(CONTROLLER_PATH . 'edit.php');
            break;
        case 'delete':

            break;
        case 'list':
            include(CONTROLLER_PATH . 'list.php');
            break;
        default:
            header("HTTP/1.0 404 Not Found");
            break;
    }
}