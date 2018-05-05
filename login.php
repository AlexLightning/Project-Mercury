<!DOCTYPE html>
<html>

<head>
<meta charset="uft-8">
<title> SellIt </title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="bootstrap.css">
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
<div class="bkg" style="background-image: url('main.jpg'); position: fixed">
	<div class="bkg2"></div>
</div>
	<div class="row menu" style="margin-top: -70px !important;">
		<div class="container">
			<div class="col-md-2">
				<a href="index.html"><h3 >SellIt</h3></a>
			</div>
		</div>
	</div>
	<div class="row form">
		<div class="container">
			<div class="col-md-4 col-md-offset-4">
				<form method="post" style="float: left">
					<h3>LOG IN</h3>
					<br>
					<label for="User" class="firstp">
						Username:
					<input type="text" name="username" id="User">
					</label>
					<br>
					<label for="Choose">
						Password:
					</label>
					<input type="password" name=" password" id="Choose">
					<br>
			        <label for="Show">
						Show Password: 
					<input type="checkbox" onclick="myFunction()" id="Show">
					<input class="submit" type="submit" name="login_user" value="SUBMIT">
				</form>
			</div>
        </div>
    </div>
</body>	
</head>


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