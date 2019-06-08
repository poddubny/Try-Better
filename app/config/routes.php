<?php
	
	$routes	= [
		'login'						=> 'main/login',
		'([a-z0-9_-]{1,16})'		=> 'main/profile/$1',
		''							=> 'main/home'
	];

	return ($routes);
?>