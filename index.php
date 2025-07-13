<?php
	require 'function.php';

	$select = new Select();

	if (isset($_SESSION['id'])) {
		$user = $select->selectUserById($_SESSION["id"]);
	}
	else{
		header("Location: lms_login.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrator Panel</title>

	<!-- CSS BOOTSRAP -->
	<link href="js/bootstrap.min.css" rel="stylesheet">

	<!-- This link is for the usage of BOXICONS ICON --->
	<link href='css/boxicons.min.css' rel='stylesheet'>


	<!-- This link is for user-defined CSS -->
	<link rel="stylesheet" type="text/css" href="css/navigation.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/login.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/header.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="date_time.css"> -->

</head>

	<frameset cols = "18%,*" border="0" noresize="off">
      <frame name = "frame_nav" src = "admin-nav.php"/>
      <frame name = "frame_body" src = "home.php" />
   	</frameset>

   	<!-- <script>
	  let arrow = document.querySelectorAll(".arrow");
	  for (var i = 0; i < arrow.length; i++) {
	    arrow[i].addEventListener("click", (e)=>{
	   let arrowParent = e.target.parentElement.parentElement;
	   arrowParent.classList.toggle("showMenu");
	    });
	  }
	</script> -->

   	<script src="js/script.js"></script>
</html>