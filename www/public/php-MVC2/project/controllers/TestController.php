<?php

namespace Project\Controllers;

use \Core\Controller;

class TestController extends Controller
{
    public function test1()
    {
        echo 'test1';
    }

    public function test2()
    {
        return $this->render('test/test2', ['value'=>"test"]);
    }
}