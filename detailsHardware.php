<?php
	
	include('config/connect.php');

	if(isset($_POST['delete'])) {
	
		//$id_delete = mysqli_real_escape_string($conn, $_POST['id_delete']);
		$id_delete = $_POST['id_delete'];

		$sql = "DELETE FROM hardwares WHERE id = " . $id_delete;

		try {
			$conn->exec($sql);
		} catch(Exception $e) {
			die("Error: " . $e->GetMessage());
		}
		/*
		if($conn->exec($sql)) {
			// Success
			header('Location: main.php');
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
		$sql = "SELECT * FROM hardwares WHERE id = " . $id;

		// Get query results
		$results = $conn->query($sql);

		// Fetch results in array format - This is used when we want one result in particular.
		

	}

?>

<?php session_start(); include('config/session.php'); ?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php') ?>

	<div class="container center">
		<?php try {
			// Get query results
			$results = $conn->query($sql);

			// Fetch results in array format - This is used when we want one result in particular.
			while($hardware = $results->fetch(PDO::FETCH_ASSOC)):		
		?>			
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
		<?php endwhile;
			} catch(Exception $e) { 
		?>
			<input type="text" name="error" value="<?php $e->GetMessage(); ?>" class="form-control-static" />
			<h1>404</h1>
			<h5>No hardware was found in the database</h5>

		<?php } ?>
	</div>

	<?php include('templates/footer.php') ?>

</html>