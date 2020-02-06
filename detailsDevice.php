<?php
	
	include('config/connect.php');

	if(isset($_POST['delete'])) {
	
		$id_delete = mysqli_real_escape_string($conn, $_POST['id_delete']);

		$sql = "DELETE FROM pcs WHERE id = $id_delete";

		if(mysqli_query($conn, $sql)) {
			// Success
			header('Location: index.php');
		} else {
			// Failure
			echo "Query Error: " . mysqli_error($conn);
		}

	}

	// Check GET request id parameter
	if(isset($_GET['id'])) {
	
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// Make SQL queries
		$sql = "SELECT * FROM pcs WHERE id = $id";

		// Get query results
		$results = mysqli_query($conn, $sql);

		// Fetch results in array format - This is used when we want one result in particular.
		$device = mysqli_fetch_assoc($results);

		mysqli_free_result($results);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php') ?>

	<div class="container center">
		<?php if($device): ?>
			
			<h4><?php echo htmlspecialchars($device['name']); ?></h4>
			<p> Type of Device: <?php echo htmlspecialchars($device['type']); ?></p>
			<p><?php echo htmlspecialchars($device['brand']) ?></p>
			<h5>Description:</h5>
			<p><?php echo htmlspecialchars($device['description']); ?></p>

			<!-- Delete Form -->
			<form action="detailsDevice.php" method="POST">
				<input type="hidden" name="id_delete" value="<?php echo $device['id'] ?>" />
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0" />
			</form>

		<?php else: ?>
			
			<h1>404</h1>
			<h5>No devices were found in the database</h5>

		<?php endif; ?>
	</div>

	<?php include('templates/footer.php') ?>

</html>