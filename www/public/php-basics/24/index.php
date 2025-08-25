<?php
require_once 'Arr.php';
require_once 'SumHelper.php';
require_once 'AvgHelper.php';

$arr = new Arr();

$arr->add(1);
$arr->add(2);
$arr->add(3);

echo $arr->getSum23() . '<br>';
echo $arr->getAvg() . '<br>';
echo $arr->getMeanSquare() . '<br>';
echo $arr->getAvgMeanSum() . '<br>';