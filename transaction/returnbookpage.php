<!-- Delete -->
<div class="modal fade" id="return<?php echo $row['borrow_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                <center><h4 class="modal-title" id="myModalLabel">Return Book</h4></center>
            </div>
            <form method="POST" action="">
                <div class="modal-body">    
                    <h3 class="text-center">Are you sure the Book is already return?</h3>
                    <h1 style="font-weight: bold" class="text-center"><?php echo $row_book['book_name']; ?></h1>
                    <input type="hidden" class="form-control" name="borrow_id" value="<?php echo $row['borrow_id']; ?>">

                    <input type="hidden" class="form-control" name="action" value="Returned">
                    <input type="hidden" class="form-control" name="book_id" value="<?php echo $row['book_id']; ?>">
                    <input type="hidden" name="isbn_no" class="form-control form-control-lg" value="<?php echo $row_book['isbn_no']; ?>">
                    <input type="hidden" name="book_name" class="form-control form-control-lg" value="<?php echo $row_book['book_name']; ?>">
                    <input type="hidden" name="author_id" class="form-control form-control-lg" value="<?php echo $row_author['author_id']; ?>">
                    <input type="hidden" name="student_name" class="form-control form-control-lg" value="<?php echo $row['student_name']; ?>">
                <br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok-circle"></span> Yes</a>
                    <!-- <a href="borrowedpage.php?return_id=<?php echo $row['borrow_id']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-ok-circle"></span> Yes</a> -->
                </div>
            </form>
        </div>
    </div>
</div>