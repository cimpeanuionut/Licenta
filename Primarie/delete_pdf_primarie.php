<?php
include('inc_primarie/db_primarie.php');
if (isset($_GET['del'])){
	$file = $_GET['del'];
	$path = $_GET['del'];


unlink($file);
$res= mysqli_query($con,"DELETE FROM pdf WHERE path='$path'");
include('Notificari_primarie_stergere.php');
echo "File Deleted! <a href='documentepdfprimarie.php'>  Click here to continue</a>";
}