<?php

namespace Project\Controllers;

use \Core\Controller;

class UserController extends Controller
{
    private $users;

    public function __construct()
    {
        $this->users = [
            1 => ['name' => 'user1', 'age' => '23', 'salary' => 1000],
            2 => ['name' => 'user2', 'age' => '24', 'salary' => 2000],
            3 => ['name' => 'user3', 'age' => '25', 'salary' => 3000],
            4 => ['name' => 'user4', 'age' => '26', 'salary' => 4000],
            5 => ['name' => 'user5', 'age' => '27', 'salary' => 5000],
        ];
    }

    public function show($params)
    {
        $this->title = 'Действие show контроллера user';

        $id = $params['id'];

        if ($id && isset($this->users[$id])) {
            print_r($this->users[$id]);
        }
    }

    public function info($params)
    {
        $this->title = 'Действие info контроллера user';

        $id = $params['id'];
        $key = $params['key'];
        $keys = ['name', 'age', 'salary'];

        if (isset($params) && in_array($key, $keys)) {
            print_r($this->users[$id][$key]);
        }
    }

    public function all()
    {
        $this->title = 'Действие all контроллера user';

        print_r($this->users);
    }

    public function first($param)
    {
        $this->title = 'Действие first контроллера user';

        for ($id = 1; $id < $param + 1; $id++) {
            print_r($this->users[$id]);
        }
    }
}