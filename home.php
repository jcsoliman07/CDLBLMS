<?php
	
	require 'function.php';


	$books = new Select();

	$selectbook = $books->selectBook();
	$book_count = mysqli_num_rows($selectbook);

	$borrow_books = new Select();

	$select_borrow_books = $borrow_books->BorrowBooks();
	$borrow_books_count = mysqli_num_rows($select_borrow_books);


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link rel="stylesheet" type="text/css" href="../includes/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../includes/datatable/dataTable.bootstrap.min.css">

  	<!-- This link is for the usage of BOXICONS ICON --->
	<link href='css/boxicons.min.css' rel='stylesheet'>

	<!-- This link is for user-defined CSS -->
	<link rel="stylesheet" type="text/css" href="date_time.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/navigation.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/login.css"> -->

	<!-- <script src="js/date_time.js"></script> -->

</head>
<body onload="initClock()">

	<div class="container-fluid">
		<div class="topwrapp">
			<!--digital clock start-->
			<div class="datetime">
			    <div class="date">
			        <span id="dayname">Day</span>,
			        <span id="month">Month</span>
			        <span id="daynum">00</span>,
			        <span id="year">Year</span>
			    </div>
			    <div class="time">
			        <span id="hour">00</span>:
			        <span id="minutes">00</span>:
			        <span id="seconds">00</span>
			        <span id="period">AM</span>
			    </div>
			</div>
			<!--digital clock end-->
		</div>

		<div class="card-container">

			<!-- This DIV is for counting of how many books are registered into the database-->
			<div class="card borrow">
				<i class='bx bxs-book'></i>
				<?php

					if ($book_count > 0) {
				?>
					<span class="count-number"><?php echo $book_count; ?></span>
				<?php
					}else{
				?>
					<span class="count-number">0</span>
				<?php
					}

				?>
				<span class="count-name">Books</span>

			</div>

			<div class="card book">
				<i class='bx bxs-book'></i>
				<?php

					if ($book_count > 0) {
				?>
					<span class="count-number"><?php echo $borrow_books_count; ?></span>
				<?php
					}else{
				?>
					<span class="count-number">0</span>
				<?php
					}

				?>
				<span class="count-name">Borrowed Books</span>
			</div>

			<!-- <div class="card">
				<i class='bx bxs-book'></i>
				<span class="count-number">100</span>
				<span class="count-name">Books</span>
			</div> -->
		</div>
	</div>



<!-- This Script is for displaying the realtime-->
<script type="text/javascript">
    function updateClock(){
      var now = new Date();
      var dname = now.getDay(),
          mo = now.getMonth(),
          dnum = now.getDate(),
          yr = now.getFullYear(),
          hou = now.getHours(),
          min = now.getMinutes(),
          sec = now.getSeconds(),
          pe = "AM";

          if(hou >= 12){
            pe = "PM";
          }
          if(hou == 0){
            hou = 12;
          }
          if(hou > 12){
            hou = hou - 12;
          }

          Number.prototype.pad = function(digits){
            for(var n = this.toString(); n.length < digits; n = 0 + n);
            return n;
          }

          var months = ["January", "February", "March", "April", "May", "June", "July", "Augest", "September", "October", "November", "December"];
          var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
          var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
          var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
          for(var i = 0; i < ids.length; i++)
          document.getElementById(ids[i]).firstChild.nodeValue = values[i];
    }

    function initClock(){
      updateClock();
      window.setInterval("updateClock()", 1);
    }
    </script>

</body>
</html>