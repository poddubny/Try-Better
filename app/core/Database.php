<?php

	/**
	*	Class Database
	*	-----------------------------------------------------
	* 	Convenient work with the base: fetch, fetchAll,
	*	fetchColumn, rowCount ...
	*	-----------------------------------------------------
	*	Copyright 2018 Maxim Poddubny (poddubny1425@gmail.com)
	**/

	class Database
	{
		protected $db;

		public function __construct()
		{
			require(DIR.'/application/config/config.php');
			$send_string = "mysql:host=".$B['HOST'].";dbname=".$B['NAME'];
			try
			{
				$this->db = new PDO($send_string, $B['USER'], $B['PASS']);
			}
			catch(PDOException $e)
			{
				echo "<h3 style='color:red'>DB CONNECT ERROR</h3>";
				exit(0);
			}
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		public function query($sql, $params = [])
		{
			$query = $this->db->prepare($sql);
			if (!empty($params))
			{
				foreach ($params as $key => $data)
				{
					$query->bindValue(':'.$key, $data);
				}
			}
			$query->execute();
			return ($query);
		}

		// Extract the next line
		public function fetch($sql, $params = [])
		{
			$query = $this->query($sql, $params);
			$result = $query->fetch(PDO::FETCH_ASSOC);
			return ($result);
		}

		// Reurns array
		public function fetchAll($sql, $params = [])
		{
			$query = $this->query($sql, $params);
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			return ($result);
		}

		// Returns a single column
		public function fetchColumn($sql, $params = [])
		{
			$query = $this->query($sql, $params);
			$result = $query->fetchColumn();
			return ($result);
		}

		// Returns the count of elements in the table
		public function rowCount($sql, $params = [])
		{
			$query = $this->query($sql, $params);
			$result = $query->rowCount();
			return ($result);
		}
	}

?>