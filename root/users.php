<?php 
include "db_connect.php"; 
$sql = 'SELECT * 
		FROM users';
		
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
	<h2>Our Community</h2>
	<table class="data-table">
		<thead>
			<tr>
				<th>NO</th>
				<th>FIRSTNAME</th>
				<th>LASTNAME</th>
				<th>EMAIL</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['firstname'].'</td>
					<td>'.$row['lastname'].'</td>
					<td>'.$row['email'].'</td>
				</tr>';
			$no++;
		}
		?>
		</tbody>
	</table>
</body>
</html>