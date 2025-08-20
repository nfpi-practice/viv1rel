<?php
	use \Core\Route;
	
	return [
		new Route('/hello/', 'hello', 'index'), // роут для приветственной страницы, можно удалить
        new Route('/act1/', 'test', 'act1'),
        new Route('/act2/', 'test', 'act2'),
        new Route('/act3/', 'test', 'act3'),
        new Route('/nums/:n1/:n2/:n3/', 'num', 'sum'),
        new Route('/user/:id/', 'user', 'show'),
        new Route('/user/:id/:key/', 'user', 'info'),
        new Route('/user/all/', 'user', 'all'),
        new Route('/user/first/:n/', 'user', 'first'),
	];
	
