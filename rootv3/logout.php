<?php
include "db_connect.php";
@session_start();
$user=$_SESSION['username'];
$query = "DELETE FROM categorie WHERE user='$user' AND titlu NOT IN (SELECT categorie FROM anunt)";
mysqli_query($mysqli, $query);

$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
require 'index.php';
?>