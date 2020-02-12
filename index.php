<?php
/*
The difference between include and require arises when the file being included 
cannot be found: include will emit a warning ( E_WARNING ) and the script will 
continue, whereas require will emit a fatal error ( E_COMPILE_ERROR ) and halt the script.
*/
	if (isset($_POST['submit'])) {
		require("userValidator.php");
		$validation = new UserValidator($_POST);
		$errors = $validation->validateForm();
		session_start(); //OBJECT SESSION -> $_SESSION = []
		if (!$errors) {
			$_SESSION["username"] = $_POST['username'];
			$_SESSION["password"] = $_POST['password'];
			include('config/connect.php');
			header("Location: main.php");
		}
		// QUERY_STRING checks out the values right after the website URL http://ad.com"?something=asdad.

		

	}
		/*
		if (empty($_POST['username']) | empty($_POST['password']) | empty($_POST['email'])) {
			$errors['username'] = "Required";
			$errors['password'] = "Required";
			$errors['email'] = "Required";
		} else {
			$user_name = htmlspecialchars($_POST['username']);
			$pass = htmlspecialchars($_POST['password']);
			$email = $_POST['email'];
		}

		if (array_filter($errors)) {
			// FOUND ERRORS
		} else {
			setcookie('username', $user_name, time() + 86400);
			setcookie('password', $pass, time() + 86400);
			setcookie('email', $pass, time() + 86400);

			session_start();

			$_SESSION['username'] = $user_name;
		*/
		// Save data to db
?>

<?php include('config/session.php'); ?>

<!DOCTYPE html>
<html>
	<?php include('templates/header.php') ?>	

	<h4 class="center grey-text">Login</h4>

	<div class="container">
		<div class="row">

			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				<label>Username: </label>
				<input type="text" name="username" />
				<div class="red-text"><?php echo $errors['username'] ?? ''; ?></div>

				<label>Password: </label>
				<input type="password" name="password" />
				<div class="red-text"><?php echo $errors['password'] ?? ''; ?></div>

				<label>E-Mail: </label>
				<input type="email" name="email" />
				<div class="red-text"><?php echo $errors['email'] ?? ''; ?></div>

				<div class="center">
					<input class="btn brand z-depth-0" type="submit" name="submit" value="submit" />
				</div>
			</form>
		</div>
	</div>

	<?php include('templates/footer.php') ?>
</html>