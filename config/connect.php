<?php
	$serv = $_SERVER['SERVER_NAME'];
	// Connect to database:
	$conn = mysqli_connect($serv, 'azambrana', 'fernandez79', 'it shop');

	// Check the connection:
	if (!$conn) {
		echo 'Connection error: ' . mysqli_connect_error();
	}

?>