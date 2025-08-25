<?php
require_once 'Product.php';

$product1 = new Product('cola', 228);
$product2 = $product1;

echo $product1->price . '<br>';
echo $product2->price . '<br>';

$product2->price = 300;
echo $product1->price . '<br>';
echo $product2->price . '<br>';