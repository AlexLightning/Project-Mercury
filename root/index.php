<html>
<head>
	<title>SellIt</title>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cookie" />
	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>

<?php

include "db_connect.php";
/*
chestii pt logare
session_start();
if($_SERVER['REQUEST_METHOD']=='POST') 
    if(isset($_POST['login']))
        include 'login.php';
    elseif(isset($_POST['register']))
        include 'register.php';*/
?>


<div class="bkg" style="background-image: url('img/main.jpg');">
	<div class="bkg2"></div>
</div>
<div class="continut">
	<div class="col-md-10 col-md-offset-1">
		<h1>SellIt</h1>
		<h2>Your gate to the world</h2>
		<form method="get" action="/search" id="search">
			<input type="text" size="40" placeholder="Search..." />
		</form>	
		<a class="buton" href="login.php">Login</a>
		<a class="buton" href="register.php">Register</a>
	</div>
</div>

</body>
</html>
