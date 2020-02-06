<?php

include('config/connect.php');

$hardware_name = $hardware_desc = $hardware_brand = $hardware_device = '';
$errors = array('hard_name' => '', 'hard_desc' => '', 'hard_brand' => '', 'hard_device' => '');

	if (isset($_POST['submit'])) {
		if (empty($_POST['hard_name']) | empty($_POST['hard_desc']) | empty($_POST['hard_brand']) | empty($_POST['hard_device'])) {
			$errors['hard_name'] = "Required";
			$errors['hard_desc'] = "Required";
			$errors['hard_brand'] = "Required";
			$errors['hard_device'] = "Required";
		} else {
			$hardware_name = $_POST['hard_name'];
			// htmlspecialchars Transforms special characters into harmless strings, avoiding the entry of
			// direct html in the inputs that could, for example, redirect users to malicious websites.
			echo htmlspecialchars($_POST['hard_name']);
			$hardware_desc = $_POST['hard_desc'];
			echo htmlspecialchars($_POST['hard_desc']);
			$hardware_brand = $_POST['hard_brand'];
			echo htmlspecialchars($_POST['hard_brand']);
			$hardware_device = $_POST['hard_device'];
			echo htmlspecialchars($_POST['hard_device']);
		}

		if (array_filter($errors)) {
			// Array filter cycles through our array and it performs a callback function on each one so we can define
			// the callback function down here: If nothing is put, it'd still cycle through. If all the positions of
			// that array are empty or the string values are empty as well, it'd return false. Otherwise it'd return true.
			// echo "There are errors in the form";
		} else {
			//Returns false - No errors
			// echo "Form is valid";
		
			$hardware_name = mysqli_real_escape_string($conn, $_POST['hard_name']);
			$hardware_desc = mysqli_real_escape_string($conn, $_POST['hard_desc']);
			$hardware_brand = mysqli_real_escape_string($conn, $_POST['hard_brand']);
			$hardware_device = mysqli_real_escape_string($conn, $_POST['hard_device']);

			// Create SQL
			$sql = "INSERT INTO pcs(name, type, description, brand) VALUES ('$device_name','$device_type','$device_desc','$device_brand')";

			// Save to database and check:

			if(mysqli_query($conn, $sql)) {
				// Success
				header("Location: main.php");
			} else {
				// Error
				echo "Query error: " . mysqli_error($conn);
			}
		}
	}

?>

<!DOCTYPE html>
<html>
	<?php include('templates/header.php') ?>
	
	<section class="container grey-text">
		<h4 class="center">Add hardware</h4>
		<form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<label>Hardware's Name</label>
			<input type="text" name="dev_name" value="<?php echo $device_name ?>"/>
			<div class="red-text"><?php echo $errors['dev_name']; ?></div>

			<label>Hardware's Description</label>
			<input type="text" name="dev_type" value="<?php echo $device_type ?>" />
			<div class="red-text"><?php echo $errors['dev_type']; ?></div>

			<label>Hardware's Brand</label>
			<input type="text" name="dev_desc" value="<?php echo $device_desc ?>" />
			<div class="red-text"><?php echo $errors['dev_desc']; ?></div>

			<label>Hardware's Device Location</label>
			<select name="hard_device">
				<?php foreach($devices as $dev): ?>
					<option value="<?php echo htmlspecialchars($dev['id']); ?>"><?php echo htmlspecialchars($dev['name']); ?></option>
				<?php endforeach; ?>
			</select>
			
			<!--<input type="text" name="dev_brand" value="<?php //echo $device_brand ?>" />
			<div class="red-text"><?php// echo $errors['dev_brand']; ?></div>-->

			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0" />
			</div>
		</form>
	</section>

	<?php include('templates/footer.php') ?>
</html>