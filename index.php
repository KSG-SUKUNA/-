<?php
require_once 'config.php';
require_once 'core/Database.php';
require_once 'core/Model.php';
require_once 'core/Controller.php';

// simple autoloader
spl_autoload_register(function ($class) {
    if (file_exists("controllers/$class.php")) {
        require_once "controllers/$class.php";
    } elseif (file_exists("models/$class.php")) {
        require_once "models/$class.php";
    }
});

$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'DashboardController';
$actionName     = isset($_GET['action']) ? $_GET['action'] : 'index';

if (!class_exists($controllerName)) {
    $controllerName = 'DashboardController';
}
$controller = new $controllerName();

if (!method_exists($controller, $actionName)) {
    $actionName = 'index';
}

$controller->$actionName();
