<!DOCTYPE html>

<?php
include_once "db_connect.php";

$sql2 = 'SELECT *
		FROM categorie';
		
$query3 = mysqli_query($mysqli, $sql2);

if (!$query3) {
	die ('SQL Error: ' . mysqli_error($mysqli));
}



session_start();
$titlu_anunt="";
$categorie_anunt="";
$descriere_anunt="";
$perioada_existenta="";
$errors = array(); 
$user=$_SESSION['username'];

if(isset($_POST['posteaza'])){
				$titlu_anunt=mysqli_real_escape_string($mysqli,$_POST['titlu']);
				$categorie_anunt=$_POST['sel2'];
				$descriere_anunt=mysqli_real_escape_string($mysqli,$_POST['descriere']);
				$perioada_existenta=mysqli_real_escape_string($mysqli,$_POST['perioada']);
				
				if (empty($titlu_anunt)){ array_push($errors, "Title is required"); }
				if (empty($descriere_anunt)){ array_push($errors, "Description is required"); }
				



if (count($errors) == 0) {
			if( $perioada_existenta>0){
			 $query = "INSERT INTO anunt (titlu, categorie, descriere, perioada, user) 
			VALUES('$titlu_anunt', '$categorie_anunt', '$descriere_anunt', '$perioada_existenta', '$user')";}
			else
			{
				$query = "INSERT INTO anunt (titlu, categorie, descriere, user) 
			VALUES('$titlu_anunt', '$categorie_anunt', '$descriere_anunt', '$user')";
			}
			 
			mysqli_query($mysqli,$query);
			echo "<script>
							alert('Advert succesfully registred!');
							</script>";
			header('location: user_main.php');
			}

			
}

if(!isset($_SESSION['success'])){
header('location: index.php');}
?>


<html>
	<head>

		<meta charset="utf-8">	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<title>Sell It</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">			
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cookie" />
		<link rel="stylesheet" href="css/style_user_ad.css">
		<script src="js/AddAdvert.js"></script>
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

	<div class="bkg" style="background-image: url('img/user-ad.jpg'); position:fixed">
		<div class="bkg2"></div>
	</div>
	<h2>Add Advert</h2>

	
<div class="row form">
	    <div class="container">
			<div class="col-md-4 col-md-offset-4">
				<form method="post" id="form2">
							<label for="Titlu"> Title </label>
								<input type="text" name="titlu" maxlength="70" id="Titlu" required>
							<br>
							<br>
								<small> <b id="wordCounterTitlu"> 70 </b> Characters remaining </small>
							<br>
							<br>
							<label> Category </label>
								<select class="form-control" name="sel2">
								<?php
									$query3 = mysqli_query($mysqli, $sql2);

									if (!$query3) {
										die ('SQL Error: ' . mysqli_error($mysqli));
									}
									while ($row = mysqli_fetch_array($query3))
									{
										echo '<option value="'.$row['titlu'].'">'.$row['titlu'].'</option>';
									}

								?>
								</select>
							<br>
							<br>
								<label for="Descriere"> Description </label>
							<br>
							<br>
								<textarea name="descriere" rows="10" cols="50" maxlength="4096" id="Descriere" required></textarea>
							<br>
							<br>
								<small> <b id="wordCounterDescriere"> 4096 </b> Characters remaining </small>
							<br>
							<br>
								<label for="Perioada"> Existing period </label>
							<br>
							<br>
								<input type="number" name="perioada" size="1" id="per" required min="0" max="366"> <p>days</p><br>
							<br>
							<br>
								<small> Max number of days: 366. If you want it forever, write 0. </small>
							<br>
							<br>
								<input class="submit" type="submit" name="posteaza" value="SUBMIT">

				</form>
			</div>
		</div>
	</div>
</body>
</html>