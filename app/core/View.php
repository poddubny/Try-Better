<?php

	/**
	*	Class View
	*	-----------------------------------------------------
	* 	All view manipulations
	*	-----------------------------------------------------
	*	Copyright 2018 Maxim Poddubny (poddubny1425@gmail.com)
	**/
	
	class View
	{
		public $path;
		public $routes;

		// Get routes file
		public function __construct($routes)
		{
			$this->routes = $routes;
			$this->path = $routes[0].'/'.$routes[1];
		}

		// Generate page
		public function generate($title, $data = [])
		{
			if (file_exists(DIR.'/application/views/'.$this->path.'.php'))
			{
				extract($data);
				require_once(DIR.'/application/views/'.$this->path.'.php');
			}
			exit(0);
		}
		
		// Page error
		public static function errorCode($error)
		{
			http_response_code($error);
			if (file_exists(DIR.'/application/views/errors/'.$error.'.php'))
				require_once(DIR.'/application/views/errors/'.$error.'.php');
			exit (0);
		}
	}

?>