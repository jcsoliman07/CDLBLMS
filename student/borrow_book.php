<!-- Edit -->
<div class="modal fade" id="borrow_<?php echo $row['book_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                <center><h1 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-check"></span>   Borrow Book</h1></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="" autocomplete="off">
                <input type="hidden" class="form-control" name="action" value="Borrowed">
				<input type="hidden" class="form-control" name="book_id" value="<?php echo $row['book_id']; ?>" readonly>

				<div class="mb-3">
                    <label class="form-label">Copyright No.:<span style="color:red; font-size: 20px;"> *</span></label>
                    <input type="text" name="isbn_no" class="form-control form-control-lg" value="<?php echo $row['isbn_no']; ?>" readonly>
                </div>
                <br>

                <div class="mb-3">
                    <label class="form-label">Title:<span style="color:red; font-size: 20px;"> *</span></label>
                    <input type="text" name="book_name" class="form-control form-control-lg" value="<?php echo $row['book_name']; ?>" readonly>
                </div>
                <br>

                <div class="mb-3">
                    <label class="form-label">Subject:<span style="color:red; font-size: 20px;"> *</span></label>
                    <select name="category" class="form-control form-control-lg">
                        <option value="<?php echo $row['category'] ?>" readonly><?php echo $cat_row['category'] ?></option>
                           	<!-- <?php
                                $selectcat = new Select();

                                $cat = $selectcat->selectCategories();

                                while ($result = mysqli_fetch_assoc($cat)) {
                            ?>
                            <option value="<?php echo $result['catid'];?>"><?php echo $result['category'];?></option>

                            <?php
                                }

                            ?> -->
                    </select>
                </div>
                <br>


                <div class="mb-3">
                    <label class="form-label">Author:<span style="color:red; font-size: 20px;"> *</span></label>
                        <select name="author_name" class="form-control form-control-lg">
                        <option value="<?php echo $row['author_name'];?>" readonly><?php echo $author_row['name'] ?></option>
                            <!-- <?php
                                $selectauthor = new Select();

                                $author = $selectauthor->selectAuthor();

                                while ($result = mysqli_fetch_assoc($author)) {
                            ?>
                                <option value="<?php echo $result['author_id'];?>"><?php echo $result['name'];?></option>

                            <?php
                                }

                            ?> -->
                    </select>
                </div>
                <br>

                <div class="mb-3">
                    <label class="form-label">Student Name:<span style="color:red; font-size: 20px;"> *</span></label>
                    <input type="text" name="student_name" class="form-control form-control-lg" required>
                </div>
                <br>

            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="borrow" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Borrow</a>
			</form>
            </div>
 
        </div>
    </div>
</div>
