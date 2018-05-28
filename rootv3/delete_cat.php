<?php 
include "db_connect.php"; 
session_start();
$user=$_SESSION['username'];
$query = "DELETE FROM categorie WHERE user='$user'";
mysqli_query($mysqli, $query);
require 'user_cat_view.php';
?>