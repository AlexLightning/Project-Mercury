<?php  
include "db_connect.php";
session_start();
 $output = '';  
 $user = $_SESSION['username'];
 $sql2 = "SELECT * FROM categorie WHERE user='$user'";
 $result = mysqli_query($mysqli, $sql2); 
 $output .= '  
	<table class="data-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>TITLE</th>
				<th>DESCRIPTION</th>
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
					 <td class="descriere" data-id2="'.$row["id"].'" contenteditable>'.$row["descriere"].'</td> 
                     <td><button type="button" name="delete_btn" data-id6="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="3">No Categories</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>