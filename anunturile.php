<!DOCTYPE html>

<?php
include_once "db_connect.php";
session_start();
$titlu_anunt="";
$categorie_anunt="";
$descriere_anunt="";
$perioada_existenta="";
$errors = array(); 

if(isset($_POST['posteaza'])){
				$titlu_anunt=mysqli_real_escape_string($mysqli,$_POST['titlu']);
				$categorie_anunt=$_POST['categ'];
				$descriere_anunt=mysqli_real_escape_string($mysqli,$_POST['descriere']);
				$perioada_existenta=mysqli_real_escape_string($mysqli,$_POST['perioada']);
				
				if (empty($titlu_anunt)){ array_push($errors, "Title is required"); }
				if (empty($descriere_anunt)){ array_push($errors, "Description is required"); }
				if (empty($perioada_existenta)){ array_push($errors, "Period is required"); }



if (count($errors) == 0) {
			 $query = "INSERT INTO anunt (titlu, categorie, descriere, perioada) 
  			  VALUES('$titlu_anunt', '$categorie_anunt', '$descriere_anunt', '$perioada_existenta')";
			 
			mysqli_query($mysqli,$query);
			echo "<script>
							alert('Advert succesfully registred!');
							</script>";
			
			}

			
}
?>


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
	<h2>Add Advert</h2>


<form method="post" id="form2">
<label for="Titlu"> Titlu </label>
<input type="text" name="titlu" maxlength="70" id="Titlu" required>
<br>
<br>
<small> <b id="wordCounterTitlu"> 70 </b> Numar de caractere ramase </small>
<br>
<br>
<label> Categorie </label>
<select name="categ">
<option value="Auto, moto si ambarcatiuni"> Auto, moto si ambarcatiuni </option>
<option value="Imobiliare"> Imobiliare </option>
<option value="Electronice si electrocasnice"> Electronice si electrocasnice </option>
<option value="Moda si frumusete"> Moda si frumusete </option>
<option value="Casa si gradina"> Casa si gradina </option>
<option value="Mama si copilul"> Mama si copilul </option>
<option value="Sport, timp liber, arta"> Sport, timp liber, arta </option>
<option value="Animale de companie"> Animale de companie </option>
<option value="Agro si industrie"> Agro si industrie </option>
<option value="Servicii, afaceri, echipamente firme"> Servicii, afaceri, echipamente firme </option>
</select>
<br>
<br>
<label for="Descriere"> Descriere </label>
<br>
<br>
<textarea name="descriere" rows="10" cols="50" maxlength="4096" id="Descriere" required></textarea>
<br>
<br>
<small> <b id="wordCounterDescriere"> 4096 </b> Numar de caractere ramase </small>
<br>
<br>
<label for="Perioada"> Perioada de existenta </label>
<br>
<br>
<input type="text" name="perioada" size="1" required > <br>
<br>
<br>
<button type="submit" name="posteaza"> Posteaza anunt </button>


</form>

<button type="button"><a href="user_main.php">Home</a></button>


<footer>

</footer>

</body>

</html>


