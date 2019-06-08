<?php

	/**
	*	Class Router
	*	-----------------------------------------------------
	* 	The router finds the array matches (routes.php) with
	*	the address URL.
	*	-----------------------------------------------------
	*	Copyright 2018 Maxim Poddubny (poddubny1425@gmail.com)
	**/

	class Router
	{	
		public 	$url;
		private $routes;

		public function __construct()
		{
			$this->url = urldecode(preg_replace('/\?.*/iu', '', App::getURL()));
			$this->routes = require_once(CONFIG.'/routes.php');
			$this->urlValid($this->url);
		}

		public function urlValid($url)
		{
			$array_url	= explode('/', $url);
			$clear_array = array_diff($array_url, ['']);
			$count_array = count($clear_array);
			if (count($array_url) != $count_array && $count_array)
				App::redirect('/'.implode('/', $clear_array));
		}

		public function run()
		{
			$endArray = end($this->routes);
			foreach ($this->routes as $key => $router)
			{
				if ($this->url === $key || preg_match('#^'.$key.'$#', $this->url))
				{
					$params = explode('/', preg_replace("~$key~", $router, $this->url));
					$paramRouter = $params[0].'/'.$params[1];
					$controllerName = ucfirst(array_shift($params));
					$actionName = 'action'.ucfirst(array_shift($params));
					$classFile = CONTROL.'/class.'.$controllerName.'.php';
					if (file_exists($classFile))
					{

						/** 
						*	spl_autoload_register { DIR.'index.php' };
						*	Standart: require_once($classFile);
						**/

						if (class_exists($controllerName))
						{
							$classObject = new $controllerName(explode('/', $paramRouter));
							if (method_exists($classObject, $actionName))
								exit($classObject->$actionName($params));
							else
								View::errorCode(404);
						}
						else
							View::errorCode(404);
					}
					else
						View::errorCode(404);
				}
				else if ($endArray == $router)
					View::errorCode(404);
			}
		}
	}
?>