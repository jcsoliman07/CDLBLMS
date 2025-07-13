<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['book_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Books</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="" autocomplete="off">
				<input type="hidden" class="form-control" name="book_id" value="<?php echo $row['book_id']; ?>">

				<div class="mb-3">
                    <label class="form-label">Copyright No.:<span style="color:red; font-size: 20px;"> *</span></label>
                    <input type="text" name="isbn_no" class="form-control" value="<?php echo $row['isbn_no']; ?>">
                </div>
                <br>

                <div class="mb-3">
                    <label class="form-label">Title:<span style="color:red; font-size: 20px;"> *</span></label>
                    <input type="text" name="book_name" class="form-control" value="<?php echo $row['book_name']; ?>">
                </div>
                <br>

                <div class="mb-3">
                    <label class="form-label">Subject:<span style="color:red; font-size: 20px;"> *</span></label>
                    <select name="category" class="form-control">
                        <option value="<?php echo $row['category'] ?>"><?php echo $cat_row['category'] ?></option>
                           	<?php
                                $selectcat = new Select();

                                $cat = $selectcat->selectCategories();

                                while ($result = mysqli_fetch_assoc($cat)) {
                            ?>
                            <option value="<?php echo $result['catid'];?>"><?php echo $result['category'];?></option>

                            <?php
                                }

                            ?>
                    </select>
                </div>
                <br>


                <div class="mb-3">
                    <label class="form-label">Author:<span style="color:red; font-size: 20px;"> *</span></label>
                        <select name="author_name" class="form-control">
                        <option value="<?php echo $row['author_name'];?>"><?php echo $author_row['name'] ?></option>
                            <?php
                                $selectauthor = new Select();

                                $author = $selectauthor->selectAuthor();

                                while ($result = mysqli_fetch_assoc($author)) {
                            ?>
                                <option value="<?php echo $result['author_id'];?>"><?php echo $result['name'];?></option>

                            <?php
                                }

                            ?>
                    </select>
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
<div class="modal fade" id="delete_<?php echo $row['book_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Author</h4></center>
            </div>
            <form method="POST" action="">
	            <div class="modal-body">	
	            	<p class="text-center">Are you sure you want to Delete</p>
					<h2 class="text-center"><?php echo $row['book_name']; ?></h2>
					<input type="hidden" class="form-control" name="delete_book_id" value="<?php echo $row['book_id']; ?>">
				</div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

	                <a href="bookspage.php?delete_book_id=<?php echo $row['book_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
	            </div>
 			</form>
        </div>
    </div>
</div>