<?php

namespace Core;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once $_SERVER['DOCUMENT_ROOT'] . '/project/config/connection.php';

spl_autoload_register(function($class) {
    preg_match('#(.+)\\\\(.+?)$#', $class, $match);

    $nameSpace = str_replace('\\', DIRECTORY_SEPARATOR, strtolower($match[1]));
    $className = $match[2];

    $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $nameSpace . DIRECTORY_SEPARATOR . $className . '.php';
});

$routes = require $_SERVER['DOCUMENT_ROOT'] . '/project/config/routes.php';

$track = ( new Router ) -> getTrack($routes, $_SERVER['REQUEST_URI']);
$page  = ( new Dispatcher )  -> getPage($track);

echo (new View) -> render($page);