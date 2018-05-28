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
		<link rel="stylesheet" href="css/style_user_view_ad.css">

	</head>
	
<script>
	
function del(){
var r = confirm("Are you sure? Process is irreversible!");
if (r == true) {
    window.location.href = "delete_ads.php";
}
}

	
</script>
	
	<?php 
		include "db_connect.php"; 
		@session_start();
		
		$user=mysqli_real_escape_string($mysqli, $_SESSION['username']);
		$sql = "SELECT * FROM anunt WHERE user='$user'";
				
		$sql2 = 'SELECT *
				FROM categorie';
				
		$query = mysqli_query($mysqli, $sql);

		$query3 = mysqli_query($mysqli, $sql2);

		if (!$query or !$query3) {
		die ('SQL Error: ' . mysqli_error($mysqli));}
		
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
	
		<div class="bkg" style="background-image: url('img/user-myad.jpg'); position:fixed">
			<div class="bkg2"></div>
		</div>
		
		<header>
		<h2>Created Adverts</h2>
		</header>	
		
		
			
	<div id="live_data"></div>
	<div id="center">
	<button type="button" onclick="del()" class="btn btn-danger">Delete All Ads</button>
	</div>
	</body>
</html>

<script>  
 $(document).ready(function(){  
		
      function fetch_data()  
      {  
           $.ajax({  
                url:"select_ad.php",  
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
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
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