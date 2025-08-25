<?php
require_once 'Arr.php';

$arr = new Arr();
$arr->add([1, 2, 3]);

print_r($arr->getAvg());
