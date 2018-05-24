<html>
<body>
	<?php

	define('DB_NAME', 'chowder_test1');
	define('DB_USER', 'chowder_test1');
	define('DB_PASSWORD', 'capstone');
	define('DB_HOST', 'db4free.net:3306');

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


	/* check connection */
/*if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}*/

	/* return name of current default database */
/*	if ($result = $mysqli->query("SELECT DATABASE()")) {
		$row = $result->fetch_row();
		printf("Default database is %s.\n", $row[0]);
		$result->close();
	}*/


	/*if ($result = $mysqli->query("SELECT id FROM accounts")) {
		$row = $result->fetch_row();
		printf("First thing is %s.\n", $row[0]);
		$result->close();
	}*/

	//header('Location: ../SeniorProject/SPPage1.html');


	//$mysqli->close();*/
	?>
</body>
</html>