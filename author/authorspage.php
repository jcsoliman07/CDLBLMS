<?php
  require '../function.php';

  // if (isset($_SESSION['id'])) {
  //   header('Location:../index.php');
  // }

  $author = new Author();

  if (isset($_POST["submit"])) {
    $result = $author->addAuthor($_POST['authorname']);

   if ($result == 1) {
      echo 
      "<script> 
        alert('Inserted New Author Successful!'); 
      </script>";
    }
    else if ($result == 100) {
      echo 
      "<script> 
        alert('Field mus not be Empty!'); 
      </script>";
    }
    else if($result == 10){
       echo 
      "<script> 
        alert('Author is already Registered!'); 
      </script>";
    }

  }

  $updateauthor = new Update();

  if (isset($_POST['edit'])) {
    $result = $updateauthor->updateAuthor($_POST['author_id'], $_POST['name']);

    if ($result == 1) {
      echo 
      "<script> 
        alert('Updating Category Successful!y'); 
      </script>";
    }
    else if($result == 10){
       echo 
      "<script> 
        alert('Author is already Registered!'); 
      </script>";
    }

  }

  $deleteauthor = new Delete();

  if (isset($_GET['delete_author_id'])) {
    $result = $deleteauthor->deleteAuthor($_GET['delete_author_id']);

    if ($result == 1) {
      echo 
      "<script> 
        alert('Delete Category Successfully!'); 
      </script>";
    }

  }


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../includes/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../includes/datatable/dataTable.bootstrap.min.css">
  <style>
    body{
    /*background-color: rgba(0, 0, 0, 0.15);*/
      animation: fadeInAnimation ease 1s;
      animation-iteration-count: 1;
      animation-fill-mode: forwards;
    }
    
    @keyframes fadeInAnimation {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
         }
    }
    .wrapp{
      margin-left: 60px;
      max-width: 90%;
    }
    .mtop10{
      margin-top:10px;
    }
    .modal-label{
      position:relative;
      top:7px
    }

  </style>
</head>
<body>
  
<div class="container-fluid">
  <div class="row">
    
    <div class="wrapp">
      <div class="row">
        <br>
      
      </div>

      <h1><span class="far fa-clipboard"></span> LIST OF AUTHORS </h1>
      <br>
      <hr class="bg-dark border-4 border-top">
      <br>
      <div class="row">
        <a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</a>
      </div>
      <br>
      <br>
      <div class="height10">
      </div>
      <div class="row">
        <table id="myTable" class="table table-bordered table-striped">
          <thead>
            <th>#</th>
            <th>Author</th>
            <!-- <th>Status</th>
            <th>Department</th> -->
            <th>Action</th>

          </thead>
          <tbody>
            <?php
              $selectAuthor = new Select();

              $author = $selectAuthor->selectAuthor();
              $i = 1;
              if (mysqli_num_rows($author)>0) {
                while ($row = mysqli_fetch_assoc($author)) {
              echo
                "<tr>
                  <td>".$i++."</td>
                  <td>".$row['name']."</td>
                  <td>
                    <a href='#edit_".$row['author_id']."' class='btn btn-success btn-sm' data-toggle='modal' data-placement='top' title='Edit Category'><span class='glyphicon glyphicon-edit'></span></a>
                    <a href='#delete_".$row['author_id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span></a>
                  </td>
                </tr>";
                  include('edit_delete_modal.php');
                }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<br>
<br>
<?php include('addauthor_modal.php') ?>
 
<script src="../includes/jquery/jquery.min.js"></script>
<script src="../includes/bootstrap/js/bootstrap.min.js"></script>
<script src="../includes/datatable/jquery.dataTables.min.js"></script>
<script src="../includes/datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->

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
</body>
</html>
