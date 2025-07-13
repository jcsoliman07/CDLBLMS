<?php
	require "function.php";

	if (isset($_SESSION['id'])) {
		header("Location: index.php");
	}

	$register = new Register();

	if (isset($_POST["submit"])) {
		$result = $register->registration($_POST["name"], $_POST["username"], $_POST["password"], $_POST["confirmpassword"]);

		if ($result == 1) {
			echo 
			"<script> 
				alert('Registration Successful!'); 
			</script>";
		}
		else if ($result == 10) {
			echo 
			"<script> 
				alert('Username is already taken!'); 
			</script>";
		}
		else if ($result == 100) {
			echo 
			"<script> 
				alert('Password does not match!'); 
			</script>";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
</head>
<body>

	<h2>Registration</h2>

	<form class="" action="" method="post" autocomplete="off">
		<label for="">Name: </label>
		<input type="text" name="name" required value=""> <br>

		<label for="">Username: </label>
		<input type="text" name="username" required value=""> <br>

		<label for="">Password: </label>
		<input type="password" name="password" required value=""> <br>

		<label for="">Confirm Password: </label>
		<input type="password" name="confirmpassword" required value=""> <br>

		<button type="submit" name="submit">Register</button>
	</form>
	<br><br>

	<a href="lms_login.php">Log-in</a>
</body>
</html>