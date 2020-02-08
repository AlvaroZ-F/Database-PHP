<?php

	session_start();

	include('config/connect.php');

	// Write query for all devices.
	$sql = 'SELECT * FROM hardwares ORDER BY id';

	// Make the query and get results:
	$results = $conn->query($sql);

	// Fetch the resulting rows as an array:
	$hardwares = $results->fetch(PDO::FETCH_ASSOC);

	// print_r(explode(',', "hello,this,is,how,explode,works"));

?>

<?php include('config/session.php'); ?>

<!DOCTYPE html>
<html>
	<?php include('templates/header.php') ?>	

	<h4 class="center grey-text">Hardwares:</h4>

	<div class="container">
		<div class="row">
			
			<?php while ($hardwares = $results->fetch(PDO::FETCH_ASSOC)): ?>

			<div class="col s6 md3">
				<div class="card z-depth-0">
					<img src="img/device.svg" class="hardware">
					<div class="card-content center">
						<h6><?php echo htmlspecialchars($hardwares['name']); ?></h6>
						<div><?php echo htmlspecialchars($hardwares['description']); ?></div>
						<div><?php echo htmlspecialchars($hardwares['brand']); ?></div>
						<div><?php echo htmlspecialchars($hardwares['device']); ?></div>
					</div>
					<div class="card-action right-align">
						<a href="detailsHardware.php?id=<?php echo $hardwares['id'] ?>" class="brand-text">More Info</a>
					</div>
				</div>
			</div>

			<?php endwhile; ?>

		</div>
	</div>

	<?php include('templates/footer.php') ?>
</html>