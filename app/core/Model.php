<?php

	/**
	*	Class Model
	*	-----------------------------------------------------
	* 	Inherited by all classes model
	*	-----------------------------------------------------
	*	Copyright 2018 Maxim Poddubny (poddubny1425@gmail.com)
	**/

	class Model extends Controller
	{
		public $db;

		public function __construct()
		{
			$this->db = new Database;
		}
	}

?>