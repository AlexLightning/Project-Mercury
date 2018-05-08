<?php 
include "db_connect.php"; 
		
$sql2 = 'SELECT *
		FROM categorie';
		
$query3 = mysqli_query($mysqli, $sql2);

if (!$query3) {
	die ('SQL Error: ' . mysqli_error($mysqli));
}?>



<html>
	<head>		
		<meta charset="utf-8">	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sell It</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">	
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cookie" >
		<link type="text/css" rel="stylesheet" href="css/style.css" >
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	
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
			

			
				<!--	<form class="navbar-form navbar-right">
			
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

		<div class="bkg" style="background-image: url('img/main.jpg');">
			<div class="bkg2"></div>
		</div>
		
		<div class="continut">
			<div>
				<h1>SellIt</h1>
				<h2>Your gate to the world</h2>
				<a class="buton" href="login.php">Login</a>
				<a class="buton" href="register.php">Register</a>
			</div>
		</div>

	</body>
</html>
