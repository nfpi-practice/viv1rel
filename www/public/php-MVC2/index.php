<?php
namespace Core;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

spl_autoload_register(function($class) {
    $root = $_SERVER['DOCUMENT_ROOT'];
    $ds = DIRECTORY_SEPARATOR;

    $file = $root . $ds . str_replace('\\', $ds, $class) . '.php';
    require $file;;
});