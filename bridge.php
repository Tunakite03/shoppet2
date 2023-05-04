<?php
define("__DIR_ROOT", __DIR__);


//Xử lý http root
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}

$dirRoot = str_replace('\\', '/', __DIR_ROOT);

$documentRoot = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);

$folder = str_replace(strtolower($documentRoot), '', strtolower($dirRoot));

$web_root = $web_root . $folder;

define('_WEB_ROOT', $web_root);

require_once "./app/App.php";
require_once "./core/Controller.php"; //Load base Controller
//Kiểm tra config và load Database
require_once './core/ConnectDB.php';
