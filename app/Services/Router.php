<?php

class Router
{
	private static $_routeData = [];

	/**
	 * Add a route that can be navigated to.
	 */
	public static function add(
		$action,
		$route
	) {
		array_push(static::$_routeData, [
			'action' => $action,
			'route' => $route,
		]);
	}

	/**
	 * Get the route the user wants to navigate to from the get object.
	 */
	private static function _get(
		$get
	) {
		$action = null;
		if (
			array_key_exists('action', $get)
			&& ($get['action'])
		) {
			$action = $get['action'];
		}

		foreach (self::$_routeData as $routeData) {
			if ($routeData['action'] === $action) {
				return $routeData['route'];
			}
		}

		return null;
	}

	/**
	 * Get and call the route the user wants to visit.
	 */
	public static function navigate()
	{
		$route = static::_get($_GET);

		$success = false;
		$view = null;
		if (!empty($route)) {
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if (method_exists($route, 'post')) {
					$view = $route::post($_GET, $_POST);
					$success = true;
				}
			} else if (method_exists($route, 'get')) {
				$view = $route::get($_GET, $_POST);
				$success = true;
			}
		}

		if (!$success) {
			http_response_code(404);
			die('404, page not found!');
		}

		if (!empty($view)) {
			echo Template::wrap($view);
		}
	}
}
