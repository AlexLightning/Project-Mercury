<?php  
 include "db_connect.php"; 
 $sql = "DELETE FROM anunt WHERE id = '".$_POST["id"]."'";  
 mysqli_query($mysqli, $sql) 
 ?>