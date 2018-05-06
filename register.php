<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cookie" />
	<link rel="stylesheet" type="text/css" href="css/style_r.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title> Sell It </title>
</head>

<?php
include "db_connect.php";
session_start();
$username = "";
$email    = "";
$errors = array(); 
if (isset($_POST['reg_user'])) {
	$firstname=mysqli_real_escape_string($mysqli, $_POST['firstname']);
	$lastname=mysqli_real_escape_string($mysqli, $_POST['lastname']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$tel = mysqli_real_escape_string($mysqli, $_POST['tel']);
	$admin = $_POST['userMode'];
	$web = mysqli_real_escape_string($mysqli, $_POST['website']);
  
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($firstname)) { array_push($errors, "firstname is required"); }
	if (empty($lastname)) { array_push($errors, "lastname is required"); }
	if (empty($password)) { array_push($errors, "Password is required"); }
	if (empty($tel)) { array_push($errors, "tel is required"); }
	if (empty($web)) { array_push($errors, "web is required"); }
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($mysqli, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "INSERT INTO users (username, email, password, admin, firstname, lastname, telefon, web) 
  			  VALUES('$username', '$email', '$password', '$admin', '$firstname', '$lastname', '$tel', '$web')";
  	mysqli_query($mysqli, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}
?>


<body>
<div class="bkg" style="background-image: url('img/register.jpg') ; position:fixed">
	<div class="bkg2"></div>
</div>
<a class="titlu" href="index.php"><h1>SellIt</h1></a>	
	<div class="row form">
	    <div class="container">
			<div class="col-md-4 col-md-offset-4">
				<form method="post">
					<h3> REGISTER </h3>
					<br>
					<div class="column">
					<label for="FName" class="firstp">
						First Name:
					</label>
					<input type="text" name="firstname" id="FName" required>
					<br>
					<label for="LName">
						Last Name:
					</label>
					<input type="text" name="lastname" id="LName" required>
					<br>
					<label for="Email">
					    Email:
					</label>
					<input type="email" name="email" id="Email" placeholder="sellit@yahoo.com" required>
					<br>
					<label for="tel">
					    Telephone:
					</label>
					<input type="tel" name="tel" id="tel" pattern="^[0-9-+s()]*$" required>
					<br>
					<label for="WPage">
					    Web Page:
					</label>
					<input type="text" name="website" id="WPage" required>
					<br>
					</div>
					<div class="column">
					<label for="User">
					    Username:
					</label>
					<input type="text" name="username" id="User" required>
					<br>
					<label for="pw">
					    Password:
					</label>
					<input type="password" name="password" id="pw">
					<br><br>
					<div class="wrapper-class">
					<label for="Show">Show Password: </label>
					<div class="btn" onclick="fct()"> <input type="checkbox" onclick="myFunction()" id="Show"/>	</div>
					</div>
					<label for="us/adm">
						Please, select User or Administrator:
					</label>
					<br>
					<div class="wrapper-class">
					<label>
						User
					</label>
					<div class="btn" onclick="fct2()"> <input type="radio" name="userMode" value="0" checked id="us"> 
					</div>
					<div class="wrapper-class">
					<label>
						Administrator
					</label>
					<div class="btn" onclick="fct3()"> <input type="radio" name="userMode" value="1" id="adm"></div>
					</div>
					<input class="submit" type="submit" name="reg_user" value="SUBMIT">
					</div>
				</form>
			</div>
		</div>
	</div>
	
<script>
function myFunction() {
    var x = document.getElementById("pw");
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

function fct2() {
	document.getElementById("adm").checked=false;
	document.getElementById("us").checked=true;
}

function fct3() {
	document.getElementById("us").checked=false;
	document.getElementById("adm").checked=true;
}
</script>


</body>
</html>