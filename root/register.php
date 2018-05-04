<!DOCTYPE html>
<html>

<head>
<title> SELLiT </title>
</head>

<body>
<header>
		<h1>  SELLiT  </h1>
</header>

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


<form method="post">
    <p>First Name: <input type="text" name="firstname"></p>
    <p>Last Name: <input type="text" name="lastname"></p>
	<p>E-mail: <input type="text" name="email"></p>
    <p>Telephone: <input type="tel" name="tel"> </p>
	<p>Webpage: <input type="text" name="website"></p>
    <p>Username: <input type="text" name="username"></p>
    <p>Password: <input type="password" id="myInput" name="password"><br><br>
      <input type="checkbox" onclick="myFunction()">Show Password</p>
    <p>Please, select User or Administrator:<input type="radio" name="userMode" value="0" checked>User
       <input type="radio" name="userMode" value="1">Administrator</p>
	<button type="submit" class="btn" name="reg_user">Register</button>
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