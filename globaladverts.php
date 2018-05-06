<?php 
include "db_connect.php"; 
$sql = 'SELECT * 
		FROM anunt';
		
$query = mysqli_query($mysqli, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($mysqli));
}?>

<html>
<head>
	<title>Sell It</title>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cookie" />
	<link rel="stylesheet" href="css/style_users.css">
</head>
<body>
	<a class="titlu" href="user_main.php"><h1>SellIt</h1></a>	
	<div class="bkg" style="background-image: url('img/users.jpg'); position:fixed">
		<div class="bkg2"></div>
	</div>
	<h2>Our Adverts</h2>
	
	<form method="get" action="/search" id="search">
			<input type="text" size="40" placeholder="Search..." />
		</form>	
		
	<table class="data-table">
		<thead>
			<tr>
				<th>NO</th>
				<th>TITLE</th>
				<th>CATEGORY</th>
				<th>DESCRIPTION</th>
				<th>DATE POSTED</th>
				<th>AVAILABILITY</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['titlu'].'</td>
					<td>'.$row['categorie'].'</td>
					<td>'.$row['descriere'].'</td>
					<td>'.$row['data'].'</td>
					<td>'.$row['perioada'].'</td>
				</tr>';
			$no++;
		}
		?>
		</tbody>
	</table>
</body>
</html>