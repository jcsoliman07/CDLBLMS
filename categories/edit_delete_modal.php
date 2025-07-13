<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['catid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Subject</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="" autocomplete="off">
				<input type="hidden" class="form-control" name="catid" value="<?php echo $row['catid']; ?>">
				<div class="form-group">

					<div class="mb-3">
						<label class="form-label">Subject: </label>
						<input type="text" name="category" class="form-control" value="<?=$row['category']?>" required>
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
<div class="modal fade" id="delete_<?php echo $row['catid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Subject</h4></center>
            </div>
            <form method="POST" action="">
	            <div class="modal-body">	
	            	<p class="text-center">Are you sure you want to Delete</p>
					<h2 class="text-center"><?php echo $row['category']; ?></h2>
					<input type="hidden" class="form-control" name="delete_catid" value="<?php echo $row['catid']; ?>">
				</div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

	                <a href="categoriespage.php?delete_catid=<?php echo $row['catid']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
	            </div>
 			</form>
        </div>
    </div>
</div>