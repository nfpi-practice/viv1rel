<?php
require_once 'User.php';

$user = new User('john', 21);

$methods = ['method1' => 'getName', 'method2' => 'getAge'];

foreach ($methods as $method) {
    echo $user->$method() . ' ';
}