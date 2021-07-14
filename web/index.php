<?php
//PHP Settings
error_reporting(E_ALL |E_STRICT);
ini_set('display_errors', 1);
date_default_timezone_set('Europe/Berlin');

//Normal Defines
define('ROOT_PATH', realpath(dirname(__FILE__) . '/../'));
define('CMS_PATH', ROOT_PATH . '/lib/core/');
define('WEB_ROOT', substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], 'index.php')));
$config = parse_ini_file(ROOT_PATH . "/config/config.ini", true);

//Start Session
session_start();

/*Require*/
require_once ROOT_PATH."/vendor/autoload.php";
require_once ROOT_PATH."/lib/database/database.php";
require_once ROOT_PATH."/app/controllers/loginController.php";
include(ROOT_PATH.'/config/routes.php');


//Init Database
$db = new database();
//Connection log
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
    } else {

    }
}
//init autoload
spl_autoload_register('autoloader');#

//init Router
$router = new Router();

//Login check | if is logged in
if (!isset($_SESSION['login']['is_login'])) {
    if (isset($_SESSION['login']['is_login']) == false) {
        $loginController = new loginController('login');
        exit();
    }
    exit();
}

/*Router*/
$router = new Router();
$router->run($routes);


