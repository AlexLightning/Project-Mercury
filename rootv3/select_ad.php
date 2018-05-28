<?php  
include "db_connect.php";
session_start();
 $output = '';  
 $user = $_SESSION['username'];
 $sql = "SELECT * FROM anunt WHERE user='$user'"; 
 $sql2 = 'SELECT * FROM categorie';
 $query3 = mysqli_query($mysqli, $sql2);
 $result = mysqli_query($mysqli, $sql);  
 $output .= '  
	<table class="data-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>TITLE</th>
				<th>CATEGORY</th>
				<th>DESCRIPTION</th>
				<th>DATE POSTED</th>
				<th>AVAILABILITY</th>
			</tr>
		</thead>
		<tbody>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="titlu" data-id1="'.$row["id"].'" contenteditable>'.$row["titlu"].'</td> 
                     <td class="categorie" data-id2="'.$row["id"].'" contenteditable>'.$row["categorie"].'</td> 
					 <td class="descriere" data-id3="'.$row["id"].'" contenteditable>'.$row["descriere"].'</td> 
					 <td>'.$row["data"].'</td>
					 <td class="perioada" data-id5="'.$row["id"].'" contenteditable>'.$row["perioada"].'</td> 
                     <td><button type="button" name="delete_btn" data-id6="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="6">No Ads</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>