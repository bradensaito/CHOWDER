<html>
<body>
	<?php

	define('DB_NAME', 'chowder_test1');
	define('DB_USER', 'chowder_test1@localhost');
	define('DB_PASSWORD', 'capstone');
	define('DB_HOST', 'db4free.net:3306');

	$link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);

	if(!$link) {
	    die('Could not connect: ' . mysql_error());
	}

	echo 'Successfully connected to database';

	?>
</body>
</html>