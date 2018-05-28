<?php 
include "db_connect.php"; 
session_start();
$user=$_SESSION['username'];
$query = "DELETE FROM anunt WHERE user='$user'";
mysqli_query($mysqli, $query);
require 'user_ad_view.php';
?>