<?php
trait Trait1 {}

echo "Задание 1 <br>";
echo "Trait1 " . trait_exists('Trait1') . "<br>";
echo "Trait2 " . trait_exists('Trait2') . "<br><br>";

echo "Задание 2 <br>";
echo "<pre>";
print_r(get_declared_traits());
echo "</pre>";