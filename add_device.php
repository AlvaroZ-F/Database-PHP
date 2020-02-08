<?php

include('config/connect.php');

$device_name = $device_type = $device_desc = $device_brand = '';
$errors = array('dev_name' => '', 'dev_type' => '', 'dev_desc' => '', 'dev_brand' => '');

	if (isset($_POST['submit'])) {
		if (empty($_POST['dev_name']) | empty($_POST['dev_type']) | empty($_POST['dev_desc']) | empty($_POST['dev_brand'])) {
			$errors['dev_name'] = "Required";
			$errors['dev_type'] = "Required";
			$errors['dev_desc'] = "Required";
			$errors['dev_brand'] = "Required";
		} else {
			$device_name = $_POST['dev_name'];
			// htmlspecialchars Transforms special characters into harmless strings, avoiding the entry of
			// direct html in the inputs that could, for example, redirect users to malicious websites.
			echo htmlspecialchars($_POST['dev_name']);
			$device_type = $_POST['dev_type'];
			echo htmlspecialchars($_POST['dev_type']);
			$device_desc = $_POST['dev_desc'];
			echo htmlspecialchars($_POST['dev_desc']);
			$device_brand = $_POST['dev_brand'];
			echo htmlspecialchars($_POST['dev_brand']);
		}

		if (array_filter($errors)) {
			// Array filter cycles through our array and it performs a callback function on each one so we can define
			// the callback function down here: If nothing is put, it'd still cycle through. If all the positions of
			// that array are empty or the string values are empty as well, it'd return false. Otherwise it'd return true.
			// echo "There are errors in the form";
		} else {
			//Returns false - No errors
			// echo "Form is valid";
		
			$device_name = $_POST['dev_name'];
			$device_type = $_POST['dev_type'];
			$device_desc = $_POST['dev_desc'];
			$device_brand = $_POST['dev_brand'];

			// Create SQL
			$sql = "INSERT INTO pcs(name, type, description, brand) VALUES ('$device_name','$device_type','$device_desc','$device_brand')";

			// Save to database and check:

			try {
				$conn->exec($sql);
				header("Location: main.php");
			} catch(Exception $e) {
				die("Error: " . $e->GetMessage());
			}
		}
	}

?>

<!DOCTYPE html>
<html>
	<?php include('templates/header.php') ?>
	
	<section class="container grey-text">
		<h4 class="center">Add a device</h4>
		<form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<label>Device's Name</label>
			<input type="text" name="dev_name" value="<?php echo $device_name ?>"/>
			<div class="red-text"><?php echo $errors['dev_name']; ?></div>

			<label>Device's Type</label>
			<input type="text" name="dev_type" value="<?php echo $device_type ?>" />
			<div class="red-text"><?php echo $errors['dev_type']; ?></div>

			<label>Device's Description</label>
			<input type="text" name="dev_desc" value="<?php echo $device_desc ?>" />
			<div class="red-text"><?php echo $errors['dev_desc']; ?></div>

			<label>Device's Brand</label>
			<input type="text" name="dev_brand" value="<?php echo $device_brand ?>" />
			<div class="red-text"><?php echo $errors['dev_brand']; ?></div>

			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0" />
			</div>
		</form>
	</section>

	<?php include('templates/footer.php') ?>
</html>