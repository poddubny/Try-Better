<?php

	session_start();

	define('/', DIRECTORY_SEPARATOR);
	define('DIR', dirname(__FILE__));
	define('LIB', DIR.'/app/lib/');
	define('CORE', DIR.'/app/core/');
	define('MODEL', DIR.'/app/models/');
	define('CONFIG', DIR.'/app/config/');
	define('CONTROL', DIR.'/app/controllers/');
	
	require_once(CONFIG.'/config.php');

	if ($CONFIG['STATUS'] == 1)
	{
		ini_set('display_errors', 1);
		error_reporting(E_ALL);
	}

	date_default_timezone_set($CONFIG['TIME_ZONE']);

	require_once(CONTROL.'/class.App.php');

	spl_autoload_register(function($class)
	{
		$dirs = [ CORE 	=> '', CONTROL => 'class.'];
		foreach ($dirs as $location => $prefix)
			if (file_exists($location.$prefix.$class.'.php'))
			{
				require_once($location.$prefix.$class.'.php');
				break;
			}
	});

	$router = new Router();
	$router->run();
	
?>
