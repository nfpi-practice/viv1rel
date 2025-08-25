<?php
interface iTest1 {}

echo "Задание 1 <br>";
echo (interface_exists('iTest1')) . "<br>";
echo (interface_exists('iTest2')) . "<br><br>";

echo "Задание 2 <br>";
echo "<pre>";
print_r(get_declared_interfaces());
echo "</pre>";