<?php

namespace Project\Controllers;

use \Core\Controller;

class NumController extends Controller
{
    public function sum($params)
    {
        $this->title = 'Действие sum контроллера num';

        $sum = 0;

        foreach ($params as $param) {
            $sum += $param;
        }

        echo $sum;
    }
}