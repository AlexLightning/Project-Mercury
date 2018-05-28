<?php  
 include "db_connect.php";
 session_start();
 $user=$_SESSION["username"];
 $sql2 = "SELECT email FROM users WHERE username='$user'";
 $result=mysqli_query($mysqli,$sql2);
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $txt=$_POST["txt"];
 if($text=='0')
	 $sql = "UPDATE anunt SET ".$column_name."=NULL WHERE id='".$id."'";
 else
	$sql = "UPDATE anunt SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if($column_name=="categorie")
 {
	 $query2="SELECT * FROM categorie WHERE titlu='$text'";
	 $result=mysqli_query($mysqli,$query2);
	 $count=mysqli_num_rows($result);
	 if($count!=0)
	 {
		 $msg= "'$column_name' was changed by admin at ad with id '$id' \n Admin msg: ";
		 $msg=$msg.$txt;
		 mail('$result',"Change made by admin",$msg);
		 mysqli_query($mysqli, $sql);
	 }
 }
 else
 {
	$msg= "'$column_name' was changed by admin at ad with id '$id' \n Admin msg: ";
	$msg=$msg.$txt;
	mail('$result',"Change made by admin",$msg);
	mysqli_query($mysqli, $sql);
 }
 ?>