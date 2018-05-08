<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sell It</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">	
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cookie" >
		<link rel="stylesheet" type="text/css" href="css/style_l.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
<script>
function fct() {
	var x = document.getElementById("pw");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
	var y=document.getElementById("Show");
	if(y.checked==false)
		y.checked=true;
	else
		y.checked=false;
}


function myFunction()
{
	var z=document.getElementById("Show");
	if(z.checked==false)
		z.checked=true;
	else
		z.checked=false;
}
</script>
		
	</head>

<?php
include "db_connect.php";

$sql2 = 'SELECT *
		FROM categorie';
		
$query3 = mysqli_query($mysqli, $sql2);

if (!$query3) {
	die ('SQL Error: ' . mysqli_error($mysqli));
}

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
		echo "<script>alert('Wrong username/password combination!');</script>";
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
			
						<li><a href="register.php"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
				
			
					</ul>
			
					<!--<form class="navbar-form navbar-right">
			
						<div class="form-group">
				
							<input type="text" class="form-control" placeholder="Search Ads">
				
						</div>
				
						<div class="form-group">
						  <select class="form-control" id="sel1">
							<option>All categories</option>
							<?php
								while ($row = mysqli_fetch_array($query3))
								{
									echo '<option value="'.$row['titlu'].'">'.$row['titlu'].'</option>';
								}
							
							?>
						  </select>
						</div>
						<button type="submit" class="btn btn-success">Search</button>
					</form>-->
			
				</div>
			
			</div>
		
		</nav>
		<script src="js/jquery.min.js"></script>
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
					<label for="pw">
					    Password:
					</label>
					<input type="password" name="password" class="form-control" id="pw">
					<br><br>
					<div class="wrapper-class">
					<label for="Show">Show Password: </label>
					<div class="btn" onclick="fct()"> <input type="checkbox" onclick="myFunction()" id="Show"/>	</div>
					</div>
					<input class="submit" type="submit" name="login_user" value="SUBMIT">
				</form>
			</div>
        </div>
    </div>
</body>
</html>