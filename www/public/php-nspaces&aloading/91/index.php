<?php

spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . DIRECTORY_SEPARATOR;
    $ds = DIRECTORY_SEPARATOR;

    $filename = $baseDir . $ds . str_replace('\\', $ds, $class) . '.php';
    require($filename);
    echo "require: $filename<br>";
});

new Core\User;
new Core\Admin\Controller;
new Project\User\Data;