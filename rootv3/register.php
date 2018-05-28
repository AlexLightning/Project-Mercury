<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sell It</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">	
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cookie" >
		<link rel="stylesheet" type="text/css" href="css/style_r.css">
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


function fct2() {
	document.getElementById("adm").checked=false;
	document.getElementById("us").checked=true;
	document.getElementById("AdminPass").type="hidden";
}

function fct3() {
	document.getElementById("us").checked=false;
	document.getElementById("adm").checked=true;
	document.getElementById("AdminPass").type="password";		
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
	if(isset($_POST['userMode']))
		$admin = $_POST['userMode'];
	else
		$admin = $_POST['adminMode'];
	$web = mysqli_real_escape_string($mysqli, $_POST['website']);
  
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($firstname)) { array_push($errors, "firstname is required"); }
	if (empty($lastname)) { array_push($errors, "lastname is required"); }
	if (empty($password)) { array_push($errors, "Password is required"); }
	if (empty($tel)) { array_push($errors, "tel is required"); }
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
  if(isset($_POST['adminMode']) && $_POST['adminpass']!="admin")
{
	echo "<script>alert('Password for admin, wrong!');</script>";
	array_push($errors, "adminpass wrong");
}
  
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "INSERT INTO users (username, email, password, admin, firstname, lastname, telefon, web) 
  			  VALUES('$username', '$email', '$password', '$admin', '$firstname', '$lastname', '$tel', '$web')";
  	mysqli_query($mysqli, $query);
	echo "<script>alert('You are now registered!');</script>";
  	header('location: index.php');
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

<div class="bkg" style="background-image: url('img/register.jpg') ; position:fixed">
	<div class="bkg2"></div>
</div>	
	<div class="row form">
	    <div class="container">
			<div class="col-md-4 col-md-offset-4">
				<form method="post">
					<h3> REGISTER </h3>
					<br>
					<div class="column">
					<label for="FName" class="firstp" >
						First Name:
					</label>
					<input type="text" name="firstname" class="form-control" id="FName" required>
					<br>
					<label for="LName">
						Last Name:
					</label>
					<input type="text" name="lastname" class="form-control" id="LName" required>
					<br>
					<label for="Email">
					    Email:
					</label>
					<input type="email" name="email" class="form-control" id="Email" placeholder="sellit@yahoo.com" required>
					<br>
					<label for="tel">
					    Telephone:
					</label>
					<input type="tel" name="tel" class="form-control" id="tel" pattern="^[0-9-+s()]*$" required>
					<br>
					<label for="WPage">
					    Web Page:
					</label>
					<input type="text" name="website" class="form-control" id="WPage">
					<br>
					</div>
					<div class="column">
					<label for="User">
					    Username:
					</label>
					<input type="text" name="username" class="form-control" id="User" required>
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
					<div class="btn" onclick="fct3()"> <input type="radio" name="adminMode" value="1" id="adm"></div>
					</div>
					<div class="wrapper-class">
					<label>
						Admin password:
					</label>
					<input type="hidden" name="adminpass" class="form-control" id="AdminPass" required>
					</div>
					<input class="submit" type="submit" name="reg_user" value="SUBMIT">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>