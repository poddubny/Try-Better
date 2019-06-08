<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title . ' | Matcha'; ?></title>
	<link rel="shortcut icon" href="/assets/images/favicon.jpg" />
	<?php
		App::include_all('css', $this->routes[1], array(
			'fontawesome.min.css',
			'bootstrap.css',
			'style.css',
		));
	?>
</head>
