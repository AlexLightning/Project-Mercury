<?php 
include "db_connect.php"; 
session_start();
$sql = 'SELECT * 
		FROM users';
		
$sql2 = 'SELECT *
		FROM categorie';
		
$query = mysqli_query($mysqli, $sql);
$query3 = mysqli_query($mysqli, $sql2);

if (!$query or !$query3) {
	die ('SQL Error: ' . mysqli_error($mysqli));
	
	if(!isset($_SESSION['success'])){
		header('location: index.php');}
}?>

<html>
	<head>
		<meta charset="utf-8">	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<title>Sell It</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">			
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cookie" />
		<link rel="stylesheet" href="css/style_users.css">
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
		
		
	<div class="bkg" style="background-image: url('img/users.jpg'); position:fixed">
		<div class="bkg2"></div>
	</div>
	<h2>Our Community</h2>

<div class="center">
<form method="post" id="search">
		<input type="text" name="search" placeholder="Search for members..."/>
		<input type="submit" class="btn btn-danger" value="GO!"/>
</form>
</div>
	
	<?php
	if(isset($_POST['search'])){
			$searchque=$_POST['search'];
			$searchque=preg_replace("#[^0-9a-z]#i","",$searchque); //asta e gen sa ia in considerare doar litere si cifre, i-ul e ca sa ia si litere mari
			$query2="SELECT * FROM users WHERE firstname='$searchque' OR  lastname='$searchque' ";
			$result=mysqli_query($mysqli,$query2);
			$count=mysqli_num_rows($result);
			if($count==0) echo '<h3>No results.</h3>';	
			else
			{				

					echo '<table class="data-table">
								<thead>
									<tr>
										<th>FIRSTNAME</th>
										<th>LASTNAME</th>
										<th>EMAIL</th>
									</tr>
								</thead>
								<tbody>';					
					while($row=mysqli_fetch_array($result))
					{
						echo '<tr>
							<td id="nothere">'.$row['firstname'].'</td>
							<td>'.$row['lastname'].'</td>
							<td>'.$row['email'].'</td>
						</tr>';
					
					}
					echo'</tbody>
					</table>
					<h2>All members</h2>';
			}
	
	}
	
	?>

	
	
	
	
	
	<table id="forUser" class="data-table">
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
                url:"select_user.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit_user.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name, txt:txt},  
                dataType:"text",			
				success:function(data){   
                          fetch_data();  
                     }  
           });  
      }  
      $(document).on('blur', '.username', function(){  
           var id = $(this).data("id1");  
           var username = $(this).text();  
           edit_data(id, username, "username");  
      });  
      $(document).on('blur', '.firstname', function(){  
           var id = $(this).data("id2");  
           var firstname = $(this).text();  
           edit_data(id,firstname, "firstname");  
      });  
	  $(document).on('blur', '.lastname', function(){  
           var id = $(this).data("id3");  
           var lastname = $(this).text();  
           edit_data(id,lastname, "lastname");  
      });  
	  $(document).on('blur', '.email', function(){  
           var id = $(this).data("id5");  
           var email = $(this).text();  
           edit_data(id,email, "email");  
      }); 
	  $(document).on('blur', '.telefon', function(){  
           var id = $(this).data("id5");  
           var telefon = $(this).text();  
           edit_data(id,telefon, "telefon");  
      }); 
	  $(document).on('blur', '.web', function(){  
           var id = $(this).data("id5");  
           var web = $(this).text();  
           edit_data(id,web, "web");  
      }); 
	  $(document).on('blur', '.admin', function(){  
           var id = $(this).data("id5");  
           var admin = $(this).text();  
           edit_data(id,admin, "admin");  
      }); 
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id6");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete_user.php",  
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

