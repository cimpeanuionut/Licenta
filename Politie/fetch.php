<?php

$connect = new PDO("mysql:host=localhost; dbname=politie", "root","");
$query = "SELECT * FROM angajati_politie";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table class="table table-striped table-bordered">
	<tr>
		<th>Name</th>
		<th>Prenume</th>
		<th>Email</th>
		<th>Adresa</th>
		<th>Telefon</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
';
if ($total_row>0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row["name"].'</td>
			<td>'.$row["prenume"].'</td>
			<td>'.$row["email"].'</td>
			<td>'.$row["adresa"].'</td>
			<td>'.$row["telefon"].'</td>
			<td>
				<button type="button name="edit" class="btn
				btn-primary btn-xs edit" id="'.$row["id"].'">Edit</button>
			</td>
			<td>
				<button type="button name="delete" class="btn
				btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>
			</td>
		</tr>
		';
	}
}else{
	$output .='
	<tr>
		<td colspan="4" align="center"> Data not found</td>
		</tr>
		';
}
$output .= '</table>';

echo $output;

?>	