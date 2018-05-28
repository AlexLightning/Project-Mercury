<?php  
 include "db_connect.php";
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE categorie SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if($column_name=="titlu")
 {
	 $query2="SELECT * FROM categorie WHERE titlu='$text'";
	 $result=mysqli_query($mysqli,$query2);
	 $count=mysqli_num_rows($result);
	 if($count==0)
		 mysqli_query($mysqli, $sql);
 }
 else
	mysqli_query($mysqli, $sql);
 ?>