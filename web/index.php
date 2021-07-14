<?php
//PHP Settings

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Europe/Berlin');
//Normal Defines
define('ROOT_PATH', realpath(dirname(__FILE__) . '/../'));
define('CMS_PATH', ROOT_PATH.'/lib/core/');
define('WEB_ROOT', substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], 'index.php')));
$config = parse_ini_file(ROOT_PATH . "/config/config.ini", true);
//Start Session
session_start();

/*Require*/
require_once ROOT_PATH."/vendor/autoload.php";
require_once ROOT_PATH."/lib/database/database.php";
require_once ROOT_PATH."/app/controllers/mainController.php";
include(ROOT_PATH.'/config/routes.php');


$db = new database();
if(isset($_SERVER['profile']['uuid'])) {
    $db->connectionLog($_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI'], $_SERVER['profile']['uuid']);
} else {
    $db->connectionLog($_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI']);
}

/*Autoloader*/
function autoloader($className) {
    if (file_exists(CMS_PATH . $className . '.php')) {
        require_once CMS_PATH . $className . '.php';
    }
    else if (file_exists(ROOT_PATH . '/lib/' . $className . '.php')) {
        require_once ROOT_PATH . '/lib/' . $className . '.php';
    }
    else if(file_exists(ROOT_PATH . '/app/models/'.$className.'.php')) {
        require_once ROOT_PATH . '/app/models/'.$className.'.php';
    }
}

spl_autoload_register('autoloader');
if(isset($_SESSION['login']['is_login'])) {
    if($_SESSION['login']['is_login'] == true) {
        $router = new Router();
        $router->run($routes);
    } else {
        $mainController = new mainController('main');
    }
} else {
    $mainController = new mainController('main');
}




