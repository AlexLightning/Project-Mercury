<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<title>SellIt</title>
		<!-- Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">	
		
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cookie" />
		<link rel="stylesheet" type="text/css" href="css/style_l.css">
		
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
		
		<nav class="navbar navbar-inverse navbar-fixed-top">
	
			<div class="container-fluid">
		
				<div class="navbar-header">
				
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navCollapse">
					
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					
					</button>
				
					<a class="navbar-brand" href="index.php">SellIt</a>
				
				</div>
		
				<div class="collapse navbar-collapse" id="navCollapse">
			
					<ul class="nav navbar-nav navbar-right">
			
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				
						<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
			
					</ul>
			
					<form class="navbar-form navbar-right">
			
						<div class="form-group">
				
							<input type="text" class="form-control" placeholder="Search SellIt">
				
						</div>
				
						<div class="form-group dropdown">
			
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Choose a category <span class="caret"></span></button>
				
							<ul class="dropdown-menu" role="menu">
						
								<li class="dropdown-header"><a href="#">All categories</a></li>
						
								<li class="divider"></li>
				
								<li class="dropdown-header"><a href="#">Auto, moto si ambarcatiuni</a></li>
								<li><a href="#">Autoturisme</a></li>
								<li><a href="#">Motociclete - Scutere - ATV</a></li>
								<li><a href="#">Camioane - Rulote - Remorci</a></li>
								<li><a href="#">Ambarcatiuni</a></li>
						
								<li class="divider"></li>
						
								<li class="dropdown-header"><a href="#">Electronice si electrocasnice</a></li>
								<li><a href="#">Telefoane</a></li>
								<li><a href="#">Laptop – Calculator</a></li>
								<li><a href="#">TV - Audio - Video</a></li>
								<li><a href="#">Electrocasnice</a></li>
								<li><a href="#">Aparate Foto - Camere Video</a></li>
						
								<li class="divider"></li>
						
								<li class="dropdown-header"><a href="#">Imobiliare</a></li>
								<li><a href="#">Apartamente - Garsoniere de vanzare</a></li>
								<li><a href="#">Apartamente - Garsoniere de inchiriat</a></li>
								<li><a href="#">Case de vanzare</a></li>
								<li><a href="#">Case de inchiriat</a></li>
								<li><a href="#">Terenuri</a></li>
				
							</ul>
				
						</div>
				
						<button type="submit" class="btn btn-danger">Search</button>
				
					</form>
			
				</div>
			
			</div>
		
		</nav>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
	
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	 
<div class="bkg" style="background-image: url('img/login.jpg');">
	<div class="bkg2"></div>
</div>
	<div class="row form">
		<div class="container">
			<div class="col-md-4 col-md-offset-4">
				<form method="post" style="float: left">
					<h3>LOG IN</h3>
					<br>
					<label for="User" class="firstp">
						Username:
					<input type="text" name="username" class="form-control" id="User">
					</label>
					<br>
					<label for="Choose">
						Password:
					</label>
					<input type="password" name=" password" class="form-control" id="Choose">
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
</html>