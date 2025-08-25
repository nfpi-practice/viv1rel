<?php
require_once 'City.php';
require_once 'User.php';

$city = new City('Yoshkar-Ola', 1584, 296004);

$props = ['name', 'foundation', 'population'];

foreach ($props as $prop ) {
    echo $prop . " " . $city->$prop . '</br>';
}



$user = new User('Иванов', 'Иван', 'Иванович');

$props2 = ['surname', 'name', 'patronymic'];
foreach ($props2 as $prop) {
    echo $user->$prop . ' ';
}