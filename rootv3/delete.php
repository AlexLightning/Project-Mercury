<?php 
include "db_connect.php"; 
session_start();
$user=$_SESSION['username'];
$query1 = "DELETE FROM anunt WHERE user='$user'";
$query2 = "DELETE FROM categorie WHERE user='$user'";
$query3 = "DELETE FROM users WHERE username='$user'";
mysqli_query($mysqli, $query1);
mysqli_query($mysqli, $query2);
mysqli_query($mysqli, $query3);
require 'logout.php';

?>