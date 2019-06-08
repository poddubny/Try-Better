<?php
	
	$CONFIG 	= [];
	$DB 		= [];
	$REGEX 		= [];

	// 1 = Debug, 0 = regular work
	$CONFIG['STATUS']		= 1;
	
	$CONFIG['SITE_NAME']		= 'Project';
	$CONFIG['DESCRIPTION']		= 'DESCRIPTION';
	$CONFIG['COPYRIGHT']		= 'poddubny';

	$CONFIG['URL']				= 'http://localhost:8101';
	$CONFIG['DEFOLT_LANG']		= 'en';
	$CONFIG['TIME_ZONE']		= 'Europe/Kiev';

	// DB config
	$DB['HOST'] = 'localhost';
	$DB['USER'] = 'x98517ee_db';
	$DB['PASS'] = '1425pmrmsw';
	$DB['NAME'] = 'x98517ee_db';

	//Regex 
	
	$REGEX['username'] = '([a-z0-9_-]{1,30})';
	$REGEX['email'] = '([a-zA-Z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})';

?>