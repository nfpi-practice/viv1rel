<?php
require_once 'Product.php';

$product = new Product('cola', 228, 2);
echo $product->getCost();

echo '<br>';

require_once 'Cart.php';

$cart = new Cart();
$cart->add(new Product("Apple", 100, 3));
$cart->add(new Product("Banana", 150, 2));
$cart->add(new Product("Orange", 200, 4));

echo $cart->getTotalCost() . '<br>';
echo $cart->getTotalQuantity() . '<br>';
echo $cart->getAvgPrice() . '<br>';

$cart->remove("Banana");

echo $cart->getTotalCost() . '<br>';
echo $cart->getTotalQuantity() . '<br>';
echo $cart->getAvgPrice() . '<br>';