<?php

	include('config/connect.php');

	// Write query for all devices.
	$sql = 'SELECT * FROM pcs ORDER BY id';

	// Make the query and get results:
	$results = $conn->query($sql);
	//results = mysqli_query($conn, $sql);

	// Fetch the resulting rows as an array:
	$devices = $results->fetch(PDO::FETCH_ASSOC);

	// print_r(explode(',', "hello,this,is,how,explode,works"));

?>

<?php session_start(); include('config/session.php'); ?>

<!DOCTYPE html>
<html>
	<?php include('templates/header.php') ?>	

	<h4 class="center grey-text">Devices:</h4>

	<div class="container">
		<div class="row">
			
			<?php while($devices = $results->fetch(PDO::FETCH_ASSOC)): ?>

			<div class="col s6 md3">
				<div class="card z-depth-0">
					<img src="img/device.svg" class="device">
					<div class="card-content center">
						<h6><?php echo htmlspecialchars($devices['name']); ?></h6>
						<div><?php echo htmlspecialchars($devices['type']); ?></div>
						<div><?php echo htmlspecialchars($devices['description']); ?></div>
						<div><?php echo htmlspecialchars($devices['brand']); ?></div>
					</div>
					<div class="card-action right-align">
						<a href="detailsDevice.php?id=<?php echo $devices['id'] ?>" class="brand-text">More Info</a>
					</div>
				</div>
			</div>

			<?php endwhile; ?>

		</div>
	</div>

	<?php include('templates/footer.php') ?>
</html>