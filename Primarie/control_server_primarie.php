<?php
if (!empty($_SERVER["HTTP_CLIENT_IP"]))
{
	$ip = $_SERVER["HTTP_CLIENT_IP"];
}
else if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
{
	$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else
{
	$ip = $_SERVER["REMOTE_ADDR"];
}


$file = file_get_contents("ip_primarie.txt");

if ((strstr($file, $ip))){
	echo "Acces Permis! <a href='semnatura_digitala_primarie.php'>  Click here to acces the server</a>";;
	
}else
	echo "Acces Denied <a href='index.php'>  Click here to return on the website</a>";

?>