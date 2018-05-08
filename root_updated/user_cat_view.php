<!DOCTYPE html>

<html>

	<head>
<meta charset="utf-8">	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<title>Sell It</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">			
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cookie" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/style_user_view_cat.css">

	</head>
	
	<?php 
		include "db_connect.php"; 
		session_start();
		$user=mysqli_real_escape_string($mysqli, $_SESSION['username']);
		$sql = "SELECT * FROM categorie WHERE user='$user'";
		
		$query3 = mysqli_query($mysqli, $sql);

		if (!$query3) {
			die('SQL Error: ' . mysqli_error($mysqli)); 
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
	
		<div class="bkg" style="background-image: url('img/user-mycat.jpg'); position:fixed">
			<div class="bkg2"></div>
		</div>
		
		<header>
		<h2>Created Categories</h2>
		</header>	
			
		<table class="data-table">
			<thead>
				<tr>
					<th>NO</th>
					<th>TITLE</th>
					<th>DESCRIPTION</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($mysqli, $sql);
					if (!$query) {
						die('SQL Error: ' . mysqli_error($mysqli)); 
					}
					$nr=1;
					while ($row = mysqli_fetch_array($query)){
						echo '<tr>
							<td>'.$nr.'</td>
							<td>'.$row['titlu'].'</td>
							<td>'.$row['descriere'].'</td>
							</tr>';
						$nr++;
					}
				?>
			</tbody>
		</table>
	</body>
</html>