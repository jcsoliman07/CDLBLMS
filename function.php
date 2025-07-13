<?php

session_start();

class Connection{
  public $host = "localhost";
  public $user = "root";
  public $password = "";
  public $db_name = "cdlblms";
  public $conn;

  public function __construct(){
  	
    $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);

    if (!$this->conn) {
    	$this->error = "Database Connection Failed!";
    	return false;
    }
  }
}


// Function for registration of new user or admin
// This function also check if the user is already registered or the username is already taken
class Register extends Connection{

  public function registration($name, $username, $password, $confirmpassword){

    $duplicate = mysqli_query($this->conn, "SELECT * FROM tbl_login WHERE username = '$username'");

	    if(mysqli_num_rows($duplicate) > 0){

	      return 10;
	      // Username or email has already taken

	    }

	    else{

		     if($password == $confirmpassword){

		        $query = "INSERT INTO tbl_login VALUES($name', '$username', '$password')";
		        mysqli_query($this->conn, $query);

		        return 1;
		        // Registration successful

		    }
		    else{

		        return 100;
		        // Password does not match

		    }
	    }
  	}
}

// This function is for checking if the login credentials is correct
// This function also execute an error message if the input password is wrong
// This function also check if the input username or password are registered or not
class Login extends Connection{
	public $conn;
	public $id;
	public $username;
  public $password;

  public function __construct($conn, $username, $password) {

    $this->conn = $conn;
    $this->username = $username;
    $this->password = $password;

    $this->checkLogin();
   }

   public function checkLogin() {
        $query = "SELECT * FROM tbl_login WHERE username = '$this->username' AND password = '$this->password'";
        $result = mysqli_query($this->conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
        		$row = mysqli_fetch_assoc($result);

            if ($this->password = $row["password"]) {
							$this->id = $row["id"];

							return 1;
							//Login Successfully!
						}
						else{
							return 10;
							//Password is Wrong!
						}

        } else {
           	return 100;
						//User not Registered!
					}
      }

	// public function __construct($conn, $username, $password){

	// 	$this->username = $username;
  //   $this->password = $password;

	// 	$result = mysqli_query($this->conn, "SELECT * FROM tbl_login WHERE username = '$username'");
	// 	$row = mysqli_fetch_assoc($result);

	// 	if (mysqli_num_rows($result) > 0) {
	// 		if ($password = $row["password"]) {

	// 			$this->id = $row["id"];

	// 			return 1;
	// 			//Login Successfully!
	// 		}
	// 		else{
	// 			return 10;
	// 			//Password is Wrong!
	// 		}
	// 	}
	// 	else{
	// 		return 100;
	// 		//User not Registered!
	// 	}
	// }

	public function idUser(){
		return $this->id;
	}
}



class Select extends Connection{

	// This function is for getting the ID of the login account
	public function selectUserById($id){
		$result = mysqli_query($this->conn, "SELECT * FROM tbl_login WHERE id = '$id'");
		return mysqli_fetch_assoc($result);
	}

	// This function is for getting the data from Categories table
	public function selectCategories(){
		$result = mysqli_query($this->conn, "SELECT * FROM tbl_category ORDER BY catid ASC");
		return $result;
	}

	// This function is for getting the data from Categories table by ID from Books Table
	public function selectCategoriesbyID($cat_id){
		$result = mysqli_query($this->conn, "SELECT * FROM tbl_category WHERE catid = '$cat_id' ORDER BY catid ASC");
		return $result;
	}

	public function selectAuthorbyID($author_id){
		$result = mysqli_query($this->conn, "SELECT * FROM tbl_author WHERE author_id = '$author_id' ORDER BY author_id ASC");
		return $result;
	}

	// This function is for getting the data from Author table
	public function selectAuthor(){
		$result = mysqli_query($this->conn, "SELECT * FROM tbl_author ORDER BY author_id ASC");
		return $result;
	}

	// This function is for getting the data from Book table
	public function selectBook(){
		$result = mysqli_query($this->conn, "SELECT * FROM tbl_book ORDER BY book_id ASC");
		return $result;
	}

	public function BorrowBooks(){
		$result = mysqli_query($this->conn,"SELECT * FROM tbl_borrow");
		return $result;
	}

	public function SelectBorrowBookByID($borrow_book_id){
		$result = mysqli_query($this->conn, "SELECT * FROM tbl_book WHERE book_id = '$borrow_book_id'");
		return $result;
	}

}


class Update extends Connection{

//This function is for Updating the Category Name base on the ID
	public function updateCategory($catid, $category){

		$duplicate = mysqli_query($this->conn,"SELECT * FROM tbl_category WHERE category ='$category'");

		if (mysqli_num_rows($duplicate)>0) {
			return 10;
			// Category is already registered!

		}
		else{
			$query = "UPDATE tbl_category SET category='$category' WHERE catid='$catid'";
			mysqli_query($this->conn, $query);

			return 1;
			//Updating Category Successfull!
		}
	}

//This function is for Updating the Authors Name base on the ID
	public function updateAuthor($author_id, $name){

		$duplicate = mysqli_query($this->conn,"SELECT * FROM tbl_author WHERE name ='$name'");

		if (mysqli_num_rows($duplicate)>0) {
			return 10;
			// Category is already registered!

		}
		else{
			$query = "UPDATE tbl_author SET name='$name' WHERE author_id='$author_id'";
			mysqli_query($this->conn, $query);

			return 1;
			//Updating Category Successfull!
		}
	}

	public function updateBooks($book_id, $isbn_no, $book_name, $category, $author_name){

		$query = "UPDATE tbl_book SET isbn_no='$isbn_no', book_name='$book_name', category='$category', author_name='$author_name' WHERE book_id='$book_id'";
		mysqli_query($this->conn, $query);

		return 1;
		//Updating Book Successfull!

	}



}


class Delete extends Connection{

//This function is for Deleting the Category base on the ID
	public function deleteCategory($delete_catid){
		$query = "DELETE FROM tbl_category WHERE catid = '$delete_catid'";
		mysqli_query($this->conn, $query);

		return 1;
		//Delete Category Successfull!
	}

//This function is for Deleting the Author base on the ID
	public function deleteAuthor($delete_author_id){
		$query = "DELETE FROM tbl_author WHERE author_id = '$delete_author_id'";
		mysqli_query($this->conn, $query);

		return 1;
		//Delete Category Successfull!
	}

	public function deleteBook($delete_book_id){
		$query = "DELETE FROM tbl_book WHERE book_id = '$delete_book_id'";
		mysqli_query($this->conn, $query);

		return 1;
		//Delete Category Successfull!
	}


}



// This function is for inserting new Category
// There's an error when inserting category that is alreay registered
// Also this function have an error message if the field is empty
class Categories extends Connection{
	public function addCategory ($category){

		$duplicate = mysqli_query($this->conn, "SELECT * FROM tbl_category WHERE category = '$category'");

		if (mysqli_num_rows($duplicate)>0) {
			return 10;
			//	Category is already Registered
		}

		else if (empty($category)) {
			return 100;

			//Field must be not Empty!
		}
		else {
			$query = "INSERT INTO tbl_category (`catid`, `category`) VALUES('','$category')";
			mysqli_query($this->conn, $query);

			return 1;

			//Inserting New Category Successfully!
		}
	}

}

// This function is for inserting new Author
// There's an error when inserting author name that is alreay registered
// Also this function have an error message if the field is empty
class Author extends Connection{
	public function addAuthor ($authorname){

		$duplicate = mysqli_query($this->conn, "SELECT * FROM tbl_author WHERE name = '$authorname'");

		if (mysqli_num_rows($duplicate)>0) {
			return 10;
			//	Category is already Registered
		}

		else if (empty($authorname)) {
			return 100;

			//Field must be not Empty!
		}
		else {
			$query = "INSERT INTO tbl_author (`author_id`, `name`) VALUES('','$authorname')";
			mysqli_query($this->conn, $query);

			return 1;

			//Inserting New Category Successfully!
		}
	}

}


class Books extends Connection{
	// public $cat_id;
	// public $author_id;
	public function addBooks($isbn_no, $book_name, $category, $author_name){
		$duplicate = mysqli_query($this->conn, "SELECT * FROM tbl_book WHERE isbn_no = '$isbn_no'");

		if (empty($isbn_no) || empty($book_name) || empty($category) || empty($author_name)) {
			return 100;

			//Field must be not Empty!
		}
		else {
			$query = "INSERT INTO tbl_book (`book_id`, `isbn_no`, `book_name`, `category`, `author_name`) VALUES('', '$isbn_no','$book_name','$category','$author_name')";
			mysqli_query($this->conn, $query);

			return 1;

			//Inserting New Book Successfully!
		}
	}

	// public function idCat(){
	// 	return $this->cat_id;
	// }

	// public function idAuthor(){
	// 	return $this->author_id;
	// }$_POST['action'], $_POST['book_id'], $_POST['isbn_no'], $_POST['book_name'], $_POST['author_name'], $_POST['student_name']

	public function BorrowBooks($action, $book_id, $isbn_no, $book_name, $author_name, $student_name){

			$query = "INSERT INTO tbl_transaction_history (`transaction_history_id`, `action`, `book_id`, `cright_no`, `book_name`, `author_id`, `student_name`) VALUES ('', '$action','$book_id','$isbn_no','$book_name','$author_name','$student_name')";

			$result = mysqli_query($this->conn, $query);

			if ($result) {

				$update = "UPDATE tbl_book SET status = 0 WHERE book_id='$book_id'";
				$result_update = mysqli_query($this->conn, $update);

				if ($result_update) {

					$query_insert = "INSERT INTO tbl_borrow (`borrow_id`, `book_name`, `book_id`, `student_name`) VALUES ('','$book_name','$book_id','$student_name')";

					mysqli_query($this->conn, $query_insert);


					return 1;
					//Borrowed Book Successfully!
					
				}
				else{

					return 10;
					//Unsuccessfull!

				}

		}
	}

	public function ReturnBooks($borrow_id, $action, $book_id, $isbn_no, $book_name, $author_id, $student_name){
		$query = "INSERT INTO `tbl_transaction_history` (`transaction_history_id`, `action`, `book_id`, `cright_no`, `book_name`, `author_id`, `student_name`) VALUES ('','$action','$book_id','$isbn_no','$book_name','$author_id', '$student_name')";

		$result = mysqli_query($this->conn, $query);

		if ($result) {

				$update = "UPDATE tbl_book SET status = 1 WHERE book_id='$book_id'";
				$result_update = mysqli_query($this->conn, $update);

				if ($result_update) {

					$query_insert = "INSERT INTO tbl_return (`return_id`, `book_name`, `book_id`, `student_name`) VALUES ('','$book_name','$book_id','$student_name')";

					$return_book_query = mysqli_query($this->conn, $query_insert);


					if ($return_book_query) {
						$query = "DELETE FROM tbl_borrow WHERE borrow_id = '$borrow_id'";
						mysqli_query($this->conn, $query);

						return 1;
						//Borrowed Book Successfully!
					}
					
				}
				else{

					return 10;
					//Unsuccessfull!

				}
		}
	}
}



?>