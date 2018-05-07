<!DOCTYPE html>

<?php
include_once "db_connect.php";
session_start();
$titlu_anunt="";
$categorie_anunt="";
$descriere_anunt="";
$perioada_existenta="";
$errors = array(); 

if(isset($_POST['posteaza'])){
				$titlu_anunt=mysqli_real_escape_string($mysqli,$_POST['titlu']);
				$categorie_anunt=$_POST['categ'];
				$descriere_anunt=mysqli_real_escape_string($mysqli,$_POST['descriere']);
				$perioada_existenta=mysqli_real_escape_string($mysqli,$_POST['perioada']);
				
				if (empty($titlu_anunt)){ array_push($errors, "Title is required"); }
				if (empty($descriere_anunt)){ array_push($errors, "Description is required"); }
				if (empty($perioada_existenta)){ array_push($errors, "Period is required"); }



if (count($errors) == 0) {
			 $query = "INSERT INTO anunt (titlu, categorie, descriere, perioada) 
  			  VALUES('$titlu_anunt', '$categorie_anunt', '$descriere_anunt', '$perioada_existenta')";
			 
			mysqli_query($mysqli,$query);
			echo "<script>
							alert('Advert succesfully registred!');
							</script>";
			
			}

			
}
?>


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
			<link rel="stylesheet" href="css/style_users.css">
			<script src="js/AddAdvert.js"></script>
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
				
					<a class="navbar-brand" href="user_main.php">SellIt</a>
				
				</div>
		
				<div class="collapse navbar-collapse" id="navCollapse">
			
					<ul class="nav navbar-nav navbar-right">
			
						<li><a href="#"><span class="glyphicon glyphicon-user"></span> My account</a></li>
				
						<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
				
						<li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			
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

	<div class="bkg" style="background-image: url('img/users.jpg'); position:fixed">
		<div class="bkg2"></div>
	</div>
	<h2>Add Advert</h2>

<form method="post" id="form2">
<label for="Titlu"> Titlu </label>
<input type="text" name="titlu" maxlength="70" id="Titlu" required>
<br>
<br>
<small> <b id="wordCounterTitlu"> 70 </b> Numar de caractere ramase </small>
<br>
<br>
<label> Categorie </label>
<select name="categ">
<optgroup label="Auto, moto si ambarcatiuni">
<option value="Auto, moto si ambarcatiuni">Auto, moto si ambarcatiuni</option>
<option value="Autoturisme">Autoturisme</option>
<option value="Motociclete - Scutere - ATV">Motociclete - Scutere - ATV</option>
<option value="Camioane - Rulote - Remorci">Camioane - Rulote - Remorci</option>
<option value="Ambarcatiuni">Ambarcatiuni</option>
<optgroup label="Electronice si electrocasnice">
<option value="Electronice si electrocasnice">Electronice si electrocasnice</option>
<option value="Telefoane">Telefoane</option>
<option value="Laptop – Calculator">Laptop – Calculator</option>
<option value="TV - Audio - Video">TV - Audio - Video</option>
<option value="Electrocasnice">Electrocasnice</option>
<option value="Aparate Foto - Camere Video">Aparate Foto - Camere Video</option>
<optgroup label="Imobiliare">
<option value="Imobiliare">Imobiliare</option>
<option value="Apartamente - Garsoniere de vanzare">Apartamente - Garsoniere de vanzare</option>
<option value="Apartamente - Garsoniere de inchiriat">Apartamente - Garsoniere de inchiriat</option>
<option value="Case de vanzare">Case de vanzare</option>
<option value="Terenuri">Terenuri</option>
</select>
<br>
<br>
<label for="Descriere"> Descriere </label>
<br>
<br>
<textarea name="descriere" rows="10" cols="50" maxlength="4096" id="Descriere" required></textarea>
<br>
<br>
<small> <b id="wordCounterDescriere"> 4096 </b> Numar de caractere ramase </small>
<br>
<br>
<label for="Perioada"> Perioada de existenta </label>
<br>
<br>
<input type="text" name="perioada" size="1" required > <br>
<br>
<br>
<button type="submit" name="posteaza"> Posteaza anunt </button>

</form>

<footer>

</footer>

</body>

</html>