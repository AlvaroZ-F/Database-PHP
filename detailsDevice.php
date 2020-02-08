<?php
	
	session_start();

	include('config/connect.php');

	if(isset($_POST['delete'])) {
	
		$id_delete = $_POST['id_delete'];

		$sql = "DELETE FROM pcs WHERE id = " . $id_delete;

		try {
			$conn->exec($sql);
		} catch(Exception $e) {
			die("Error: " . $e->GetMessage());
		}

		/*
		if(mysqli_query($conn, $sql)) {
			// Success
			header('Location: index.php');
		} else {
			// Failure
			echo "Query Error: " . mysqli_error($conn);
		}
		*/

	}

	// Check GET request id parameter
	if(isset($_GET['id'])) {
	
		$id = $_GET['id'];

		// Make SQL queries
		$sql = "SELECT * FROM pcs WHERE id = " . $id;

	}

?>

<?php include('config/session.php'); ?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php') ?>

	<div class="container center">
		<?php try {
			// Get query results
			$results = $conn->query($sql);

			// Fetch results in array format - This is used when we want one result in particular.
			while ($device = $results->fetch(PDO::FETCH_ASSOC)):
		?>
			
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

		<?php 
				endwhile;
		} catch(Exception $e) {
		?>
			<input type="text" name="error" value="<?php $e->GetMessage(); ?>" class="form-control-static" />
			<h1>404</h1>
			<h5>No devices were found in the database</h5>

		<?php } ?>
	</div>

	<?php include('templates/footer.php') ?>

</html>