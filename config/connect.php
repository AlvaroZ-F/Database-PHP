<?php
	$serv = $_SERVER['SERVER_NAME'];
	// Connect to database:
	try {
		$conn = new PDO('mysql:host=' . $serv . '; dbname=it shop', $_SESSION["username"], $_SESSION["password"]);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn->exec("SET CHARACTER SET utf8");
	} catch(Exception $e) {
		die("Error: " . $e->GetMessage());
	}
?>