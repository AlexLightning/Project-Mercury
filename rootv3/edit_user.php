<?php  
 include "db_connect.php";
 $result=mysqli_query($mysqli,$sql2);
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE users SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if($column_name=="username")
 {
	 $query2="SELECT * FROM users WHERE username='$text'";
	 $result=mysqli_query($mysqli,$query2);
	 $count=mysqli_num_rows($result);
	 if($count==0)
		 if($column_name=="admin" && $text>=0 && $text<=1)
			mysqli_query($mysqli, $sql);
 }
 else
	 if($column_name=="admin" && $text>=0 && $text<=1)
		mysqli_query($mysqli, $sql);
 ?>