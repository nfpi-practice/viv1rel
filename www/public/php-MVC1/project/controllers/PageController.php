<?php

namespace Project\Controllers;

use \Core\Controller;

class PageController extends Controller
{
    private $pages;

    public function __construct()
    {
        $this->pages = [
            1 => ['title' => 'страница 1', 'text' => 'текст страницы 1'],
            2 => ['title' => 'страница 2', 'text' => 'текст страницы 2'],
            3 => ['title' => 'страница 3', 'text' => 'текст страницы 3'],
        ];
    }

    public function act()
    {
        $this->title = 'Действие act контроллера page';

        return $this->render('page/act', [
            'header' => 'список юзеров',
            'users'  => ['user1', 'user2', 'user3'],
        ]);
    }

    public function show($params)
    {
        $this->title = 'Действие show контроллера page';

        $n = $params['n'];
        $page = $this->pages[$n];

        return $this->render('page/show', [
            'title' => $page['title'],
            'text' => $page['text'],
        ]);
    }
}