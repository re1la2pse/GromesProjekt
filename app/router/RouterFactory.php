<?php

namespace App;

use Nette,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


/**
 * Router factory.
 */
class RouterFactory
{

	/**
	 * @return \Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		$router = new RouteList();

        $admin = new RouteList('Admin');
        $admin[] = new Route('admin/<presenter>/<action>[/<id>]', 'Homepage:default');
        $router[] = $admin;

        $client = new RouteList('Client');
        $client[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
        $router[] = $client;

		$router[] = new Route('<presenter>/<action>[/<id>]', 'Client:Homepage:default');
		return $router;
	}

}
