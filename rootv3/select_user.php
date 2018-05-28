<?php  
include "db_connect.php";
 $output = '';  
 $sql2 = "SELECT * FROM users";
 $result = mysqli_query($mysqli, $sql2); 
 $output .= '  
	<table class="data-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>USERNAME</th>
				<th>FIRST NAME</th>
				<th>LAST NAME</th>
				<th>EMAIL</th>
				<th>PHONE</th>
				<th>WEB</th>
				<th>ADMIN</th>
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
					 <td class="username" data-id0="'.$row["id"].'" contenteditable>'.$row["username"].'</td> 
                     <td class="firstname" data-id1="'.$row["id"].'" contenteditable>'.$row["firstname"].'</td> 
					 <td class="lastname" data-id2="'.$row["id"].'" contenteditable>'.$row["lastname"].'</td> 
					 <td class="email" data-id3="'.$row["id"].'" contenteditable>'.$row["email"].'</td> 
					 <td class="telefon" data-id4="'.$row["id"].'" contenteditable>'.$row["telefon"].'</td> 
					 <td class="web" data-id5="'.$row["id"].'" contenteditable>'.$row["web"].'</td> 
					 <td class="admin" data-id7="'.$row["id"].'" contenteditable>'.$row["admin"].'</td> 
                     <td><button type="button" name="delete_btn" data-id6="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">No Users</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>