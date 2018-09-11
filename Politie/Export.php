<?php
$connect = mysqli_connect("localhost", "root" , "" ,"politie");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM angajati_politie";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Name</th>  
                         <th>Prenume</th>
						 <th>Email</th>  
						 <th>Adresa</th>  
						 <th>Telefon</th>   
                    </tr>
					';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["name"].'</td>  
						 <td>'.$row["prenume"].'</td>
                         <td>'.$row["email"].'</td>
						 <td>'.$row["adresa"].'</td>
						 <td>'.$row["telefon"].'</td>						 
    </tr>
   ';
   }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}

?>