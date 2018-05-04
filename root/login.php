<!DOCTYPE html>
<html>

<head>
<title> SellIt </title>
</head>

<?php

include "db_connect.php";
session_start();
$errors = array();
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($mysqli, $_POST['username']);
  $password = mysqli_real_escape_string($mysqli, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($mysqli, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
?>

<body>
<header>
		<h1>  SellIt  </h1>
</header>

<form method="post">
User: <input type="text" name="username"><br>
Password: <input name="password" type="password" id="myInput"><br><br>
<input type="checkbox" onclick="myFunction()">Show Password
<button type="submit" class="btn" name="login_user">Login</button>
</form>

<script>
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>

</body>
</html>
