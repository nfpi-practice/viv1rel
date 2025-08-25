<?php

use Modules\Shop\Core\Cart;
use Modules\Shop\UserCart;

require_once 'core/Cart.php';
require_once 'UserCart.php';

$cart = new Cart();
$userCart = new UserCart();