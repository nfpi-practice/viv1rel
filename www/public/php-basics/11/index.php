<?php
require_once 'City.php';

$cities = [
    new City('Yoshkar-Ola', 296004),
    new City('Kazan', 296005),
    new City('Moscow', 296006),
    new City('Samara', 296007),
    new City('Omsk', 296008)
];

foreach ($cities as $city) {
    echo $city->name . ' ' . $city->population . '<br>';
}