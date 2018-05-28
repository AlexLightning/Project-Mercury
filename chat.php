<?php 
session_start();
?>


<!doctype.html>
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
	
	<link rel="stylesheet" href="css/style_chat.css" type="text/css" />
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
		
		
	<div class="bkg" style="background-image: url('img/chat.jpg'); position:fixed">
		<div class="bkg2"></div>
	</div>
	<h2>Chat</h2>
	<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_SESSION['username']; ?></b></p>
        <div style="clear:both"></div>
    </div>
     
   <div id="chatbox"><?php
	if(file_exists("chat_log.html") && filesize("chat_log.html") > 0){
		$handle = fopen("chat_log.html", "r");
		$contents = fread($handle, filesize("chat_log.html"));
		fclose($handle);
		 
		echo $contents;
	}
	?></div>
     
    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript">
	// jQuery Document
	$(document).ready(function(){
		$("#usermsg").keydown(function(e){
			if(e.keyCode == 13) {
				var clientmsg = $("#usermsg").val();
				$.post("chat_server.php", {text: clientmsg});
				$("#usermsg").val("");
				return false;
			}
		});
		$("#submitmsg").click(function(){	
			var clientmsg = $("#usermsg").val();
			$.ajax({
				url: "chat_server.html",
				method:"POST",  
                data:{text:clientmsg}
			});
			//$.post("chat_server.php", {text: clientmsg});				
			$("#usermsg").val("");
			return false;
		});	
		$("#usermsg").focus();
		function loadLog(){		
			var oldscrollHeight = $("#chatbox").prop("scrollHeight") - 20;	
			$.ajax({
				url: "chat_log.html",
				cache: false,
				success: function(html){
					var scrolltop = $("#chatbox").scrollTop();
					var prevmsgid = $("#chatbox div").last().attr('id');
					var newmsgid = $(html).attr('id');				
					if(prevmsgid != newmsgid){
						$("#chatbox").append(html);
					}
					var newscrollHeight = $("#chatbox").prop("scrollHeight") - 20;
					if(scrolltop == (oldscrollHeight-270) && newscrollHeight > oldscrollHeight){
						$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); 
					}				
				},
			});
		}
		setInterval (loadLog, 70);
	});
	</script>

</body>
</html>	