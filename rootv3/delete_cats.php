<?php  
 include "db_connect.php"; 
 $sql = "DELETE FROM categorie WHERE id = '".$_POST["id"]."'";  
 mysqli_query($mysqli, $sql) 
 ?>