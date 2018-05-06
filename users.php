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
	
<form method="post">
		<input type=''text" name="search" placeholder="Search for members..."/>
		<input type="submit" value="GO!"/>
</form>
	
	<?php
	$output='';
//	$fname='';
	//$lname='';
	//$email='';
	if(isset($_POST['search'])){
			$searchque=$_POST['search'];
			//$searchque=preg_replace("#[^0-9a-z]#i","",$searchque); //asta e gen sa ia in considerare doar litere si cifre, i-ul e ca sa ia si litere mari
			$query2="SELECT * FROM users WHERE firstname='$searchque' OR  lastname='$searchque' ";
			$result=mysqli_query($mysqli,$query2);
			$count=mysqli_num_rows($result);
			if($count==0) $output= 'There was no such results';	
									
			
					while($row=mysqli_fetch_array($result))
					{
						$fname=$row['firstname'];
						$lname=$row['lastname'];
						$email=$row['email'];
						$output .='<div> '.$fname.' '.$lname.' '.$email.' </div>';
					

					}
	
	}
	PRINT("$output");
	?>

	
	
	
	
	
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