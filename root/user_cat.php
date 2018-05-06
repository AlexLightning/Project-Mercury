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
	
		<script src="js/AddCategory.js"></script>
	
		<link rel="stylesheet" type="text/css" href="css/AddCategory.css">

	</head>
	
	<?php
		
		include "db_connect.php";
	
		session_start();
		
		$errors = array();
		
		if(isset($_POST['advert'])){
		
			$titlu = mysqli_real_escape_string($mysqli, $_POST['titlu']);
			$descriere = mysqli_real_escape_string($mysqli, $_POST['descriere']);
		
			if (empty($titlu)) {
				array_push($errors, "Title is required");
			}
		
			if (empty($descriere)) {
				array_push($errors, "Description is required");
			}
			
			if (count($errors) == 0) {
				$query="INSERT INTO categorie (titlu, descriere) VALUES ('$titlu', '$descriere')";
				mysqli_query($mysqli, $query);
				$_SESSION['titlu'] = $titlu;
				$_SESSION['descriere'] = $descriere;
				$_SESSION['success'] = "Your advert has been posted successfully";
				header('location: user_main.php');
			}
		}
	?>
  
	<body>
  
		<nav class="navbar navbar-default navbar-fixed-top">
	
			<div class="container-fluid">
		
				<div class="navbar-header">
				
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navCollapse">
					
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					
					</button>
				
					<a class="navbar-brand" href="user_main.php">Logo</a>
				
				</div>
		
				<div class="collapse navbar-collapse" id="navCollapse">
			
					<ul class="nav navbar-nav navbar-right">
			
						<li><a href="#"><span class="glyphicon glyphicon-user"></span> My account</a></li>
				
						<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
				
						<li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			
					</ul>
			
					<form class="navbar-form navbar-right">
			
						<div class="form-group">
				
							<input type="text" class="form-control" placeholder="Cauta SellIt">
				
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
	
		<header>
			<h1>Add category</h1>
		</header>
	
		<hr>
	
		<form method="post">
	
			<label for="Titlu">Title</label>
			<input type="text" name="titlu" maxlength="70" id="Titlu">
			<small> <b id="wordCounterTitlu">70</b>Number of characters remaining</small>
		
			<hr>
		
			<label for="Descriere">Description</label>
			<textarea name="descriere" rows="10" cols="50" maxlength="4096" id="Descriere"></textarea>
			<small><b id="wordCounterDescriere">4096</b>Number of characters remaining</small>
		
			<button type="submit" name="advert">Post category</button>
		
		</form>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
	
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
		
		<footer>

		</footer>
	
	</body>
  
</html>