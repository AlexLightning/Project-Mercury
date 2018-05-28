<?php 
include "db_connect.php"; 
session_start();
$sql = 'SELECT * 
		FROM anunt';
		
$sql2 = 'SELECT *
		FROM categorie';
		
$query = mysqli_query($mysqli, $sql);

$query3 = mysqli_query($mysqli, $sql2);

if (!$query or !$query3) {
die ('SQL Error: ' . mysqli_error($mysqli));}

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
		<link rel="stylesheet" href="css/style_global_adverts.css">
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
			
				</div>
			
			</div>
		
		</nav>
		<script src="js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
			
	<div class="bkg" style="background-image: url('img/global-adverts.jpg'); position:fixed">
		<div class="bkg2"></div>
	</div>
	
	<h2>Our Adverts</h2>
	
<div class="center">
<form method="post" id="search">
		<input type="text" name="search" placeholder="Search for ads..."/>
		<br><br>
		<p style="display: inline; color: white; font-size: 20px;">Category</p>
		<div class="form-group">
		  <select name="category" class="form-control" style="width:22% !important; margin:auto !important;" id="sel1">
			<?php
				$query3 = mysqli_query($mysqli, $sql2);
				if (!$query3) {
					die ('SQL Error: ' . mysqli_error($mysqli));}
				while ($row = mysqli_fetch_array($query3))
				{
					echo '<option value="'.$row['titlu'].'">'.$row['titlu'].'</option>';
				}
			?>
		  </select>
		</div>
		<input name="butsrc" type="submit" class="btn btn-danger" value="GO!"/>
</form>
</div>
				
		
	<?php
	if(isset($_POST['butsrc'])){
			$searchque=$_POST['search'];
			$searchcat=$_POST['category'];
			if($searchque==NULL){
				$query2="SELECT * FROM anunt WHERE titlu is not null and categorie='$searchcat'";
			}
			else{
				$query2="SELECT * FROM anunt WHERE titlu regexp '(^|[[:space:]])$searchque([[:space:]]|$)' AND categorie='$searchcat'";
			}
			$result=mysqli_query($mysqli,$query2);
			$count=mysqli_num_rows($result);
			if($count==0) echo '<h3>No results.</h3>';	
			else
			{				

					echo '<table class="data-table">
								<thead>
									<tr>
										<th>TITLE</th>
										<th>CATEGORY</th>
										<th>DESCRIPTION</th>
										<th>DATE POSTED</th>
										<th>AVAILABILITY</th>
									</tr>
								</thead>
								<tbody>';					
					while($row=mysqli_fetch_array($result))
					{
						date_default_timezone_set ( "Europe/Bucharest" );
						$now = time();
						$val=$row['perioada']-round(($now-strtotime($row['data'])) / (60 * 60 * 24));
						if($row['perioada']==NULL)
							$val='';
						echo '<tr>
							<td id="nothere">'.$row['titlu'].'</td>
							<td>'.$row['categorie'].'</td>
							<td>'.$row['descriere'].'</td>
							<td>'.$row['data'].'</td>
							<td>'.$val.'</td>
						</tr>';
					
					}
					echo'</tbody>
					</table>
					<h2>All ads</h2>';
			}
	
	}
	
	?>	
		
	<table id="forUser" class="data-table">
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
			date_default_timezone_set ( "Europe/Bucharest" );
			$now = time();
			$val=$row['perioada']-round(($now-strtotime($row['data'])) / (60 * 60 * 24));
			if($row['perioada']==NULL)
				$val='';
			echo '<tr">
					<td>'.$no.'</td>
					<td>'.$row['titlu'].'</td>
					<td>'.$row['categorie'].'</td>
					<td>'.$row['descriere'].'</td>
					<td>'.$row['data'].'</td>
					<td>'.$val.'</td>
				</tr>';
			$no++;
		}
		?>
		</tbody>
	</table>
	<div id="live_data"></div>
  
</body>
</html>

<script>  
 $(document).ready(function(){  
      var admin = <?php echo $_SESSION['admin']; ?>;
	  if(admin==1)
	  {
		  document.getElementById('live_data').style.display='block';
		  document.getElementById('forUser').style.display='none';
	  }
	  else
	  {
		  document.getElementById('live_data').style.display='none';
		  document.getElementById('forUser').style.display='block';
	  }
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      function edit_data(id, text, column_name)  
      {  
			var txt = prompt("Please insert msg:", "None.");
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name, txt:txt},  
                dataType:"text",			
				success:function(data){   
                          fetch_data();  
                     }  
           });  
      }  
      $(document).on('blur', '.titlu', function(){  
           var id = $(this).data("id1");  
           var titlu = $(this).text();  
           edit_data(id, titlu, "titlu");  
      });  
      $(document).on('blur', '.categorie', function(){  
           var id = $(this).data("id2");  
           var categorie = $(this).text();  
           edit_data(id,categorie, "categorie");  
      });  
	  $(document).on('blur', '.descriere', function(){  
           var id = $(this).data("id3");  
           var descriere = $(this).text();  
           edit_data(id,descriere, "descriere");  
      });  
	  $(document).on('blur', '.perioada', function(){  
           var id = $(this).data("id5");  
           var perioada = $(this).text();  
           edit_data(id,perioada, "perioada");  
      }); 
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id6");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete_admin.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){    
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>

