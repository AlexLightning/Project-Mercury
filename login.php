<!DOCTYPE html>
<html>

<head>
<meta charset="uft-8">
<title> Sell It </title>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cookie" />
<link rel="stylesheet" type="text/css" href="css/style_l.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
  	  header('location: user_main.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
?>

<body>
<div class="bkg" style="background-image: url('img/login.jpg');">
	<div class="bkg2"></div>
</div>
<a class="titlu" href="index.php"><h1>SellIt</h1></a>
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
					<div class="wrapper-class">
			        <label for="Show">
						Show Password: 
					<div class="btn" onclick="fct()"><input type="checkbox" onclick="myFunction()" id="Show"></div>
					</div>
					<input class="submit" type="submit" name="login_user" value="SUBMIT">
				</form>
			</div>
        </div>
    </div>
</body>	
</head>


<script>
function myFunction() {
    var x = document.getElementById("Choose");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function fct() {
	x=document.getElementById("Show");
	if(x.checked==false)
		x.checked=true;
	else
		x.checked=false;
}
</script>

</body>
</html>