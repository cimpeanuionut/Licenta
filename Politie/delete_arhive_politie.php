<?php
include('inc_politie/db_politie.php');
if (isset($_GET['del'])){
	$file = $_GET['del'];
	$path = $_GET['del'];


unlink($file);
$res= mysqli_query($con,"DELETE FROM arhive WHERE path='$path'");

include ('Notificare_politie_stergere.php');

echo "File Deleted! <a href='arhivezipsaurarpolitie.php'>  Click here to continue</a>";
}