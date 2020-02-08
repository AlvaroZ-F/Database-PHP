<?php

	//$user_name = $pass = $email = '';
	//$errors = array('username' => '', 'password' => '', 'email' => '');

	
	 // If first value doesn't exist, then it equals to the second.

?>

<head>
	<title>Database Testing</title>
	<link rel="stylesheet" 
		href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<style type="text/css">

		select{
			display:block;
		}

		.brand {
			background: #cbb09c !important;
		}

		.brand-text {
			color: #cbb09c !important;
		}

		.brand-black {
			color: #000 !important;
			font-weight: bold;
		}

		form {
			max-width: 460px;
			margin: 20px auto;
			padding: 20px;
		}

		.device {
			max-width: 100px;
			margin: 40px auto -30px;
			display: block;
			position: relative;
			top: 10px;
		}

		.hardware {
			max-width: 100px;
			margin: 40px auto -30px;
			display: block;
			position: relative;
			top: 10px;
		}

	</style>
</head>	
<body class="grey lighten-4">
	<nav class="white z-depth-0">
		<div class="container">
			<a href="main.php" class="brand-logo brand-text">PHP Database</a>
			<ul id="nav-mobile" class="right hide-on-small-and-down">
				<li class="black-text"><a class="brand-black" href="index.php">Logout</a></li>
				<li class="grey-text"> Hello <?php echo htmlspecialchars($name); ?></li>
			</ul>
		</div>
	</nav>
