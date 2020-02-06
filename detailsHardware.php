<?php
	
	include('config/connect.php');

	if(isset($_POST['delete'])) {
	
		$id_delete = mysqli_real_escape_string($conn, $_POST['id_delete']);

		$sql = "DELETE FROM hardwares WHERE id = $id_delete";

		if(mysqli_query($conn, $sql)) {
			// Success
			header('Location: main.php');
		} else {
			// Failure
			echo "Query Error: " . mysqli_error($conn);
		}

	}

	// Check GET request id parameter
	if(isset($_GET['id'])) {
	
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// Make SQL queries
		$sql = "SELECT * FROM hardwares WHERE id = $id";

		// Get query results
		$results = mysqli_query($conn, $sql);

		// Fetch results in array format - This is used when we want one result in particular.
		$hardware = mysqli_fetch_assoc($results);

		mysqli_free_result($results);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php') ?>

	<div class="container center">
		<?php if($hardware): ?>
			
			<h4><?php echo htmlspecialchars($hardware['name']); ?></h4>
			<p> Description: <?php echo htmlspecialchars($hardware['description']); ?></p>
			<p> Brand: <?php echo htmlspecialchars($hardware['brand']) ?></p>
			<h5>Assembled in Device #:</h5>
			<p><h4><?php echo htmlspecialchars($hardware['device']); ?></h4></p>

			<!-- Delete Form -->
			<form action="detailsHardware.php" method="POST">
				<input type="hidden" name="id_delete" value="<?php echo $hardware['id'] ?>" />
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0" />
			</form>

		<?php else: ?>
			
			<h1>404</h1>
			<h5>No hardware was found in the database</h5>

		<?php endif; ?>
	</div>

	<?php include('templates/footer.php') ?>

</html>