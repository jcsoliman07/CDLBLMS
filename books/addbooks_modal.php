<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"> Add New Books </h4></center>
            </div>
            <div class="modal-body">
    			<div class="container-fluid">
        			<form method="POST" action="" autocomplete="off">

        				<div class="mb-3">
                        	<label class="form-label">Copyright No.:<span style="color:red; font-size: 20px;"> *</span></label>
                        	<input type="text" name="isbn_no" class="form-control">
                      	</div>
                        <br>

                        <div class="mb-3">
                            <label class="form-label">Title:<span style="color:red; font-size: 20px;"> *</span></label>
                            <input type="text" name="book_name" class="form-control">
                        </div>
                        <br>

                        <div class="mb-3">
                            <label class="form-label">Subject:<span style="color:red; font-size: 20px;"> *</span></label>
                            <select name="category" class="form-control">
                                <option value="">--SELECT--</option>
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
                                <option value="">--SELECT--</option>
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
                        <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
        			</form>
            </div>
        </div>
    </div>
</div>