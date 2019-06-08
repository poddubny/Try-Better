<?php

	/**
	*	Class Controller
	*	-----------------------------------------------------
	* 	Inherited by all classes
	*	-----------------------------------------------------
	*	Copyright 2018 Maxim Poddubny (poddubny1425@gmail.com)
	**/

	class Controller
	{
		// public $db;
		public $view;
		public $model;
		public $routes;

		public function __construct($routes)
		{
			$this->routes = $routes;
			// $this->db = new Database;
			$this->view = new View($routes);
			$this->model = $this->startModel($routes[0]);
		}

		public function startModel($model)
		{
			$path = DIR.'/application/models/model.'.ucfirst($model).'.php';
			if (file_exists($path))
			{
				require_once ($path);
				if (!class_exists('model_'.ucfirst($model)))
					View::errorCode(404);
				$name = 'model_'.ucfirst($model);
				$this->$model = new $name;
				return ($this->$model);
			}
		}
	}

?>