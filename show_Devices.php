<?php

	include('config/connect.php');

	// Write query for all devices.
	$sql = 'SELECT * FROM pcs ORDER BY id';

	// Make the query and get results:
	$results = mysqli_query($conn, $sql);

	// Fetch the resulting rows as an array:
	$devices = mysqli_fetch_all($results, MYSQLI_ASSOC);

	// Free the results from memory:
	mysqli_free_result($results);

	// Close Connection:
	mysqli_close($conn);

	// print_r(explode(',', "hello,this,is,how,explode,works"));

?>

<!DOCTYPE html>
<html>
	<?php include('templates/header.php') ?>	

	<h4 class="center grey-text">Devices:</h4>

	<div class="container">
		<div class="row">
			
			<?php foreach($devices as $dev): ?>

			<div class="col s6 md3">
				<div class="card z-depth-0">
					<img src="img/device.svg" class="device">
					<div class="card-content center">
						<h6><?php echo htmlspecialchars($dev['name']); ?></h6>
						<div><?php echo htmlspecialchars($dev['type']); ?></div>
						<div><?php echo htmlspecialchars($dev['description']); ?></div>
						<div><?php echo htmlspecialchars($dev['brand']); ?></div>
					</div>
					<div class="card-action right-align">
						<a href="detailsDevice.php?id=<?php echo $dev['id'] ?>" class="brand-text">More Info</a>
					</div>
				</div>
			</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php') ?>
</html>