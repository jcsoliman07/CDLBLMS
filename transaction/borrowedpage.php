<?php
 require '../function.php';


 $return = new Books();

 if (isset($_POST['submit'])) {
    $result = $return->ReturnBooks($_POST['borrow_id'], $_POST['action'], $_POST['book_id'], $_POST['isbn_no'], $_POST['book_name'], $_POST['author_id'], $_POST['student_name']);

    if ($result == 1) {
      echo 
      "<script> 
        alert('Book Return Successfully!'); 
      </script>";
    }
    else{
    	echo 
      "<script> 
        alert('Unsuccessfully!'); 
      </script>";
    }

  }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title></title>

	<!-- CSS BOOTSRAP -->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="../includes/bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="../includes/datatable/dataTable.bootstrap.min.css">

	<!-- This link is for the usage of BOXICONS ICON --->
	 <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	 <!-- This link is for the usage of SWEETALERT --->
	 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<style>
		.container-book{
			position: relative;
			top: 30px;
			width: 100%;
			height: auto;
			padding: 15px;
		}

		.container-book .wrapper{
			width: 100%;
			padding: 40px;
			background-color: #F8F8FA;
			box-shadow: 0px 10px 20px rgba(0,0,0,0.10);
		}


	</style>


</head>
<body>

	<div class="container-book">

		<div class="wrapper">

	      	<h1><span class="bx bx-clipboard"></span>List of Borrowed Books</h1>
	      	<hr class="bg-dark border-4 border-top">
	      	<br>
	      	<div class="row">
	        	<table id="myTable" class="table table-bordered table-striped">
	          	<thead>
		            <th>#</th>
		            <th>COPYRIGHT NO.</th>
		            <th>TITLE</th>
		            <th>SUBJECT</th>
		            <th>AUTHOR</th>
		            <th>Action</th>

		          </thead>
		          <tbody>
		            <?php
		              $selectbook = new Select();
		              $borrowbook = $selectbook->BorrowBooks();
		              $i = 1;

		              if (mysqli_num_rows($borrowbook)>0) {
		                while ($row = mysqli_fetch_assoc($borrowbook)) {

		                	$selectborrowbook = new Select();
		                  $rowbook = $selectborrowbook->SelectBorrowBookByID($row['book_id']);

		                  while ($row_book = mysqli_fetch_assoc($rowbook)) {

		                  	$selectcategory = new Select();
		                  	$cat = $selectcategory->selectCategoriesbyID($row_book['category']);
		                  	while ($row_cat = mysqli_fetch_assoc($cat)) {


		                  		$selectauthor = new Select();
			                  	$author = $selectauthor->selectAuthorbyID($row_book['author_name']);
			                  	while ($row_author = mysqli_fetch_assoc($author)) {


			                    	if (mysqli_num_rows($borrowbook)>0) {
			                    		echo
							                "<tr>
							                  <td>".$i++."</td>
							                  <td>".$row_book['isbn_no']."</td>
							                  <td>".$row_book['book_name']."</td>
							                  <td>".$row_cat['category']."</td>
							                  <td>".$row_author['name']."</td>
							                  <td>
							                  	<a href='#return".$row['borrow_id']."' class='btn btn-primary btn-sm' data-toggle='modal' data-placement='top' title='Return Book'><span class='glyphicon glyphicon-check'></span> Return </a>
							                  </td>
								                </tr>";

								              // This include is modal form for borrowing book
							        				include('returnbookpage.php');

			                    	}

			                    	else {
			                    		echo
							                	"Swal.fire('SweetAlert2 is working!')";
			                    	}

			                    }
		                    }
		                  }
		                }
		              }
		            ?>
		          </tbody>
		        </table>

			<!-- <table id="myTable" class="table table-bordered table-striped">

				<thead>
					<th>#</th>
		            <th>COPYRIGHT NO.</th>
		            <th>TITLE</th>
		            <th>SUBJECT</th>
		            <th>AUTHOR</th>
		            <th>Action</th>
				</thead>

			</table> -->
			</div>
		</div>
	</div>











<script src="../includes/jquery/jquery.min.js"></script>
<script src="../includes/bootstrap/js/bootstrap.min.js"></script>
<script src="../includes/datatable/jquery.dataTables.min.js"></script>
<script src="../includes/datatable/dataTable.bootstrap.min.js"></script>


<!-- This Script is for the Data Table -->

<script>
$(document).ready(function(){
  //inialize datatable
    $('#myTable').DataTable();
 
    //hide alert
    $(document).on('click', '.close', function(){
      $('.alert').hide();
    })
});
</script>

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