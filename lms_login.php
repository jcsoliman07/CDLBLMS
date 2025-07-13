<?php

	require "function.php";
	$conn = mysqli_connect("localhost", "root", "", "cdlblms");

	// include 'db_connection.php'; // make sure this sets $conn
	// include 'function.php';

	if (isset($_SESSION["id"])) {
		header("Location: index.php");
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	    $username = $_POST['username'] ?? '';
	    $password = $_POST['password'] ?? '';

	    $login = new Login($conn, $username, $password); //Include Class Name
	    // $login->checkLogin();
	}
	
	if (isset($_POST["submit"])) {
		$result = $login->checkLogin($_POST['username'], $_POST['password']) ;

		if ($result == 1) {
			$_SESSION["login"] = true;
			$_SESSION["id"] = $login->idUser();
			header("Location: index.php");
		}
		else if ($result == 10) {
			echo 
			"<script> 
				alert('Password is Wrong!'); 
			</script>";
		}
		else if ($result == 100) {
			echo 
			"<script> 
				alert('User not Registered!'); 
			</script>";
		}
	}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'> -->
    <!-- <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'> -->
    <link rel='stylesheet' href='css/all.min.css'>
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/login.css" />

	<title>Login</title>
</head>
<body>

	<button class="login-button" href="#" data-target="#login" data-toggle="modal">Login as Librarian</button>
	<button class="login-guest" onclick="location.href='student/studentpag.php'" data-toggle="modal">Login as Student</button>
		<div id="login" class="modal fade" role="dialog">
		  <div class="container">
		    <div class="form-container sign-in-container">
		      <form action="" method="post" autocomplete="off">
		        	<h1>Librarian</h1>
		        	<input type="text" name="username" required value="" placeholder="Username" />
		        	<input type="password" name="password" required value="" placeholder="Password" />
		        	<!-- <a href="#">Forgot your password?</a> -->
		        	<button class="btn-login" name="submit">Log In</button>
		      </form>
		    </div>
		</div>
	</div>


	<script src='js/jquery.min.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<!-- <h2>Login</h2> -->

	<!-- <form class="" action="" method="post" autocomplete="off">

		<label>Username</label>
		<input type="text" name="username" required value=""> <br>

		<label>Password</label>
		<input type="password" name="password" required value=""> <br>

		<button type="submit" name="submit">Login</button>
	</form> -->
</body>
</html>