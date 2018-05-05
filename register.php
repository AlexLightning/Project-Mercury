<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<title> SellIt </title>
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
<div class="bkg" style="background-image: url('main.jpg') ; position:fixed">
	<div class="bkg2"></div>
</div>
	<div class="row menu" style="margin-top: -70px !important;">
		<div class="container">
			<div class="col-md-2">
				<a href="index.html"><h3>SellIt</h3></a>
			</div>
        </div>
    </div>		
	<div class="row form">
	    <div class="container">
			<div class="col-md-4 col-md-offset-4">
				<form method="post">
					<h3> REGISTER </h3>
					<br>
					<label for="FName" class="firstp">
						First Name:
					</label>
					<input type="text" name="firstname" id="FName" >
					<br>
					<label for="LName">
						Last Name:
					</label>
					<input type="text" name="lastname" id="LName" >
					<br>
					<label for="Email">
					    Email:
					</label>
					<input type="fieldsetup" name="email" id="Email" placeholder="sellit@yahoo.com">
					<br>
					<label for="tel">
					    Telephone:
					</label>
					<input type="tel" name="tel" id="tel" >
					<br>
					<label for="WPage">
					    Web Page:
					</label>
					<input type="text" name="website" id="WPage" >
					<br>
					<label for="User">
					    Username:
					</label>
					<input type="text" name="username" id="User" >
					<br>
					<label for="pw">
					    Password:
					</label>
					<input type="password" name="password" id="pw" >
					<label for="Show">
						Show Password: 
					</label>	
					<input type="checkbox" onclick="myFunction()" id="Show">
					<br>
					<label for="us/adm">
						Please, select User or Administrator:
					</label>
					<br>
					<label>
						User
					</label>
					<input type="radio" name="userMode" value="0" checked id="us/adm"> 
					<label>
						Administrator
					</label>
					<input type="radio" name="userMode" value="1" checked id="us/adm"> 
					<br>
					<input class="submit" type="submit" name="reg_user" value="SUBMIT">
				</form>
			</div>
		</div>
	</div>
	
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