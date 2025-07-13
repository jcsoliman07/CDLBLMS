<!-- <?php
	require 'function.php';

	$select = new Select();

	if (isset($_SESSION['id'])) {
		$user = $select->selectUserById($_SESSION["id"]);
	}
	else{
		header("Location: lms_login.php");
	}

?> -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title></title>

	<!-- CSS BOOTSRAP -->

	<link href="js/bootstrap.min.css" rel="stylesheet">

	<!-- This link is for the usage of BOXICONS ICON --->
	 <link href='css/boxicons.min.css' rel='stylesheet'>


	<!-- This link is for user-defined CSS -->
	<link rel="stylesheet" type="text/css" href="css/navigation.css">

  <!-- This link is for user-defined CSS -->
  <link rel="stylesheet" type="text/css" href="date_time.css">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" type="text/css" href="css/navigation.css">

</head>
<body>

  <div class="sidebar">
    <div class="logo-details">
      <img class="logo" src="img/SchoolLogo.png" alt="">
      <span class="logo_name">Colegio de Los Baños</span>
    </div>

    <ul class="nav-links">

      <li class="list">
        <a href="home.php" target="frame_body">
          <i class='bx bxs-home' ></i>
          <span class="link_name">Home</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Home</a></li>
        </ul>
      </li>

      <li class="list">
        <a  href="books/bookspage.php" target="frame_body">
          <i class='bx bxs-book-alt'></i>
          <span class="link_name">Books</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name">Books</a></li>
        </ul>
      </li>

      <li class="list">
        <a  href="author/authorspage.php" target="frame_body">
          <i class='bx bxs-user'></i>
          <span class="link_name">Authors</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name">Authors</a></li>
        </ul>
      </li>

      <li class="list">
        <a  href="categories/categoriespage.php" target="frame_body">
          <i class='bx bxs-book'></i>
          <span class="link_name">Category</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name">Category</a></li>
        </ul>
      </li>

      <li>

        <div class="icon-link">
          <a href="transaction/borrowedpage.php" target="frame_body">
            <i class='bx bx-revision'></i>
            <!-- <i class='bx bxs-user-circle'></i> -->
            <span class="link_name">Transaction</span>
          </a>
          <!-- <i class='bx bxs-chevron-down arrow' ></i> -->
        </div>

       <!--  <ul class="sub-menu">
          <li><a class="link_name" href="#">Transaction</a></li>
          <li class="list"><a href="transaction/borrowedpage.php" target="frame_body"><i class='bx bx-revision'></i> Borrowed / Returning</a></li> -->
          <!-- <li class="list"><a href="#" target="frame_body"><i class='bx bx-revision'></i> Returning</a></li> -->
        <!-- </ul> -->
        
      </li>
   
        <div class="profile-details">
            <div class="profile_name">
              <i class='bx bx-log-out' style="color: darkred;"></i>
              <a onclick="checker()" href="lms_logout.php?logout" target="_parent" style="color: white;">Log-out</a>
            </div>
        </div>
    </ul>

  </div>

 <script>
  let list = document.querySelectorAll('.list');
  for (let i=0; i<list.length; i++){
    list[i].onclick = function (){ 
      let j = 0;
      while(j < list.length){
        list[j++].className = 'list';
      }
      list[i].className = 'list active';
    }
        
  }
</script>

  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;
   arrowParent.classList.toggle("showMenu");
    });
  }
  </script>

  <script>
  function checker() {
    var result = confirm('Are you sure you want to Logout?');
    if (result == false){
      event.preventDefault();
    }
  }
</script>
	





<!--             	<h2><?php echo $user["name"]; ?></h2>
            </div>
            <div class="designation">Admin</div>
          </div>
        </div>
        <a href="lms_logout.php"><i class="bx bx-log-out" id="log_out"></i></a>
      </li>
    </ul>
  </div>
 -->
<script src="js/script.js"></script>
	
</body>
</html>