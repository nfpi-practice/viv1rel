<?php
require_once 'ArraySumHelper.php';

$helper = new ArraySumHelper();
$array = [1, 2, 3];

echo $helper->getAvg1($array) . '<br>'; // 6 (1+2+3)
echo $helper->getAvg2($array) . '<br>'; // ~3.74 (sqrt(1+4+9))
echo $helper->getAvg3($array) . '<br>'; // ~3.30 (куб.корень(1+8+27))
echo $helper->getAvg4($array) . '<br>'; // ~3.15 (корень 4-й степени(1+16+81))