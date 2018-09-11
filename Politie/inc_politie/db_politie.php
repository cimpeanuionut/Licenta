<?php
$error = "error";

$con = mysqli_connect('localhost', 'root', '') or die ($error);
mysqli_select_db($con,'politie')or die($error);



?>