<?php  
 include "db_connect.php";
 session_start();
 $user=$_SESSION["username"];
 $sql2 = "SELECT email FROM users WHERE username='$user'";
 $result=mysqli_query($mysqli,$sql2);
 $id = $_POST["id"];  
 $oldt=$_POST["oldt"];
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
  $txt=$_POST["txt"];
 $sql = "UPDATE categorie SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if($column_name=="titlu")
 {
	 $query2="SELECT * FROM categorie WHERE titlu='$text'";
	 $query="UPDATE anunt SET categorie=".$text."' WHERE categorie='".$oldt."'";
	 $result=mysqli_query($mysqli,$query2);
	 $count=mysqli_num_rows($result);
	 if($count==0)
	 {
		 $msg= "'$column_name' was changed by admin at category with id '$id' \n Admin msg: ";
		 $msg=$msg.$txt;
		 mail('$result',"Change made by admin",$msg);
		 mysqli_query($mysqli, $sql);
		 mysqli_query($mysqli, $query);
	 }
 }
 else
 {
	 $msg= "'$column_name' was changed by admin at category with id '$id' \n Admin msg: ";
	 $msg=$msg.$txt;
	 mail('$result',"Change made by admin",$msg);
	mysqli_query($mysqli, $sql);
 }
 ?>