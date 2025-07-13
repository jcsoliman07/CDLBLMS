<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['author_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Author</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="" autocomplete="off">
				<input type="hidden" class="form-control" name="author_id" value="<?php echo $row['author_id']; ?>">
				<div class="form-group">

					<div class="mb-3">
						<label class="form-label">Author: </label>
						<input type="text" name="name" class="form-control" value="<?=$row['name']?>" required>
					</div>

					<br>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>
 
        </div>
    </div>
</div>
 
<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['author_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Author</h4></center>
            </div>
            <form method="POST" action="">
	            <div class="modal-body">	
	            	<p class="text-center">Are you sure you want to Delete</p>
					<h2 class="text-center"><?php echo $row['name']; ?></h2>
					<input type="hidden" class="form-control" name="delete_author_id" value="<?php echo $row['author_id']; ?>">
				</div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

	                <a href="authorspage.php?delete_author_id=<?php echo $row['author_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
	            </div>
 			</form>
        </div>
    </div>
</div>