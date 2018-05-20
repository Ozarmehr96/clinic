<?php 
/*$text = "2018-03-24";
$pattern = "/([0-9]{4})-([0-9]{2})-([0-9]{2})/";
$replacement = "Сегодня $3, месяц $2, год $1;";
$r = preg_replace($pattern, $replacement, $text);
echo $r;*/

// FRONT CONTROLLER
session_start();
//  1. ОБЩИЕ НАСТРОЙКИ 
ini_set('display_errors', 1);
error_reporting(E_ALL);

//  2. ПОДКЛЮЧЕНИЕ ФАЙЛОВ СИСТЕМЫ
define('ROOT', dirname(__FILE__));
require_once (ROOT.'\components\AutoLoad.php');

//  3. УСТАНОВКА СОЕДИНЕНИЯ С БД


//  4. ВЫЗОВ ROUTER
$router = new Router();
$router->run();
?>