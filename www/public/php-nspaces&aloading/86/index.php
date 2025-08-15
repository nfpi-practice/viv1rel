<?php
require_once 'core/Controller.php';
require_once 'project/Controller.php';

$core = new \Core\Controller;
$project = new \Project\Controller;

require_once 'modules/cart/Cart.php';
require_once 'modules/cart/Test.php';

$cart1 = new \Modules\Cart\Cart;
$test1 = new \Modules\Cart\Test;

require_once 'modules/shop/cart/Cart.php';
require_once 'modules/shop/cart/Test.php';

$cart2 = new \Modules\Shop\Cart\Cart;
$test2 = new \Modules\Shop\Cart\Test;

require_once 'modules/marketCart.php';
require_once 'modules/shopCart.php';

$cart3 = new \Market\Cart\Cart;
$cart4 = new \Shop\Cart\Cart;
