<?php 
include "db_connect.php"; 
session_start();
$id = $_POST["id"]; 
$query = "DELETE FROM anunt WHERE user = (SELECT username FROM users WHERE id='$id')";
$query2 = "DELETE FROM categorie WHERE user = (SELECT username FROM users WHERE id='$id')";
$query3= "DELETE FROM users WHERE id = '$id'";
mysqli_query($mysqli, $query);
mysqli_query($mysqli, $query2);
mysqli_query($mysqli, $query3);
require 'users.php';
?>