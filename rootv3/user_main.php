<!DOCTYPE html>

<?php 
include "db_connect.php"; 
session_start();
$sql2 = 'SELECT *
		FROM categorie';
		
$query3 = mysqli_query($mysqli, $sql2);

if (!$query3) {
	die ('SQL Error: ' . mysqli_error($mysqli));}
	
if(!isset($_SESSION['success'])){
header('location: index.php');}

if($_SESSION['admin']==0)
{
		$adminName = "user";
		$admin = 0;
}
else
{
	$adminName = "admin";
	$admin = 1;
}
	
?>


<script>

function del(){
var x = document.getElementById("delete");
var r = confirm("Are you sure? Process is irreversible!");
if (r == true) {
    x.href = "delete.php";
}
}

</script>


<html>

	<head>
<meta charset="utf-8">	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<title>Sell It</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">			
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cookie" />
		<link rel="stylesheet" href="css/style_user_main.css">
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
		
<div class="bkg" style="background-image: url('img/user_main.jpg');">
	<div class="bkg2"></div>
</div>
<h2>Welcome, <?php echo $_SESSION['username']?> (<?php echo $adminName?>)</h2>
<nav>
	<ul class="menu">
		<li><a href="global_adverts.php">Global Adverts</a></li>
		<li><a href="user_ad.php">Add Advert</a></li>
		<li><a href="user_cat.php">Add Category</a></li>
		<li><a href="user_ad_view.php">My Adverts</a></li>
		<li><a href="user_cat_view.php">My Categories</a></li>
		<li><a href="forum.php">Visit Forum</a></li>
		<li><a href="chat.php">View Chat</a></li>
		<li><a href="users.php">Browse Users</a></li>
		<li><a id="delete" href="" onclick="del()">Delete Account</a></li>
	</ul>
</nav>
</body>
</html>
