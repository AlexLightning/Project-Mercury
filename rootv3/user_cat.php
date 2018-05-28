<!DOCTYPE html>

<html>

	<head>
  
		<meta charset="utf-8">	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<title>Sell It</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">			
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cookie" />
		<script src="js/AddCategory.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/style_user_cat.css">
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
		
		if(isset($_POST['advert'])){
		
			$titlu = mysqli_real_escape_string($mysqli, $_POST['titlu']);
			$descriere = mysqli_real_escape_string($mysqli, $_POST['descriere']);
			$user= mysqli_real_escape_string($mysqli, $_SESSION['username']);
		
			if (empty($titlu)) {
				array_push($errors, "Title is required");
			}
		
			if (empty($descriere)) {
				array_push($errors, "Description is required");
			}
			$queryTest = "SELECT * FROM categorie WHERE titlu='$titlu'";
			$results = mysqli_query($mysqli, $queryTest);
			if (mysqli_num_rows($results)>0)
			{
				$errors=1;
				echo "<script>alert('Category already exists!');</script>";
			}
			if (count($errors) == 0) {
				$query="INSERT INTO categorie (titlu, descriere,user) VALUES ('$titlu', '$descriere', '$user')";
				mysqli_query($mysqli, $query);
				$_SESSION['titlu'] = $titlu;
				$_SESSION['descriere'] = $descriere;
				$_SESSION['success'] = "Your category has been posted successfully";
				echo "<script>alert('Your category has been posted successfully!');</script>";
				header('location: user_main.php');
			}
		}
		
		if(!isset($_SESSION['success'])){
			header('location: index.php');}
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
				
					<a class="navbar-brand" href="user_main.php">SellIt</a>
				
				</div>
		
				<div class="collapse navbar-collapse" id="navCollapse">
			
					<ul class="nav navbar-nav navbar-right">
			
						<li><a href="user_main.php"><span class="glyphicon glyphicon-user"></span> My account</a></li>
				
				
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			
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
	
		<div class="bkg" style="background-image: url('img/user-cat.jpg'); position:fixed">
			<div class="bkg2"></div>
		</div>
		<h2>Add Category</h2>
	
		
<div class="row form">
	    <div class="container">
			<div class="col-md-4 col-md-offset-4">	
				<form method="post" id="form2">
			
					<label for="Titlu">Title</label>
					<input type="text" name="titlu" maxlength="70" id="Titlu" required>
					<small> <b id="wordCounterTitlu"> 70 </b> Characters remaining </small>
					<br>
					<br>
					<label for="Descriere">Description</label>
					<textarea name="descriere" rows="10" cols="50" maxlength="100" id="Descriere"></textarea>
					<small><b id="wordCounterDescriere"> 100 </b> Characters remaining </small>
					<br>
					<br>
					<input class="submit" type="submit" name="advert" value="SUBMIT">			
				</form>
		</div>
	</div>
</div>	
</body>
</html>