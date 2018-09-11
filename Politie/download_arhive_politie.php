<?php
include('inc_politie/db_politie.php');

if (isset($_GET['dow'])){
	
	$path = $_GET['dow'];
	
	$res = mysqli_query($con,"SELECT * FROM arhive WHERE path='$path'");
	
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename=" ' .basename($path).'"');
	header('Content-Length: ' . filesize($path));
	readfile($path);
	
	
}

?>