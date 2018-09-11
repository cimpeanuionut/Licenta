<?php
$connect = new PDO("mysql:host=localhost; dbname=politie", "root","");

if (isset($_POST["action"]))
{
	if($_POST["action"] =="insert")
	{
		$query = "INSERT INTO angajati_politie(name, prenume, email, adresa, telefon) VALUES(
		'".$_POST["name"]."', '".$_POST["prenume"]."', '".$_POST["email"]."', '".$_POST["adresa"]."', '".$_POST["telefon"]."')";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p> Data Inserted...</p>';
	}
	
	if ($_POST["action"] == 'fetch_single')
	{
	$query=" SELECT * FROM angajati_politie WHERE id = '".$_POST["id"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row){
		$output['name'] = $row['name'];
		$output['prenume'] = $row['prenume'];
		$output['email'] = $row['email'];
		$output['adresa'] = $row['adresa'];
		$output['telefon'] = $row['telefon'];
	}
	
	echo json_encode($output);
	
	}
	
	if ($_POST["action"] =="update")
	{
		$query = " UPDATE angajati_politie SET name = '".$_POST["name"]."',
		prenume = '".$_POST["prenume"]."',
		email = '".$_POST["email"]."',
		adresa = '".$_POST["adresa"]."',
		telefon = '".$_POST["telefon"]."' WHERE id = '".$_POST["hidden_id"]."'";
		
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p> Data Updated</p>';
	}
	
	if ($_POST["action"] =='delete')
	{
		$query = "DELETE FROM angajati_politie WHERE id='".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p> Data Deleted</p>';
	}
	
}


?>