<?php


// 1. Общие настройки

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

// 2. Подключение файлов системы

define('ROOT', dirname(__FILE__));
require_once('../components/Router.php');
require_once('../components/Db.php');

// 3. Установка соединения с БД


// 4. Вызор Router

$router = new Router();
$router->run();