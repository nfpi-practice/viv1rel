<?php

namespace Project\Controllers;

use \Core\Controller;

class TestController extends Controller
{
    public function act1()
    {
        $this->title = 'Действие act1 контроллера test';

        echo "1";
    }

    public function act2()
    {
        $this->title = 'Действие act2 контроллера test';

        echo "2";
    }

    public function act3()
    {
        $this->title = 'Действие act3 контроллера test';

        echo "3";
    }
}