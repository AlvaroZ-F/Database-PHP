<!DOCTYPE html>

<?php

	session_start();

	

	include('config/session.php');

?>


<html>
	<?php include('templates/header.php') ?>

	<nav class="white">
		<div class="container">
			<ul id="nav-mobile" class="right hide-on-small-and-down">
				<li><a href="show_Devices.php" class="btn brand z-depth-0">Show All Devices</a></li>
				<li><a href="add_device.php" class="btn brand z-depth-0">Add a Device</a></li>
				<li><a href="show_Hardware.php" class="btn brand z-depth-0">Show All Hardware</a></li>
				<li><a href="add_hardware.php" class="btn brand z-depth-0">Add hardware</a></li>
			</ul>
		</div>
	</nav>


	<?php include('templates/footer.php') ?>
</html>