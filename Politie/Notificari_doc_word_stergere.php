<?php

date_default_timezone_set('Europe/Bucharest');

function show_date() {
	return date('l, jS F H:i');
	
}

$date = show_date();

$f =fopen('Fisier_notificari_politie.txt', 'a');
fwrite($f,'A fost sters fisierul la date de  '.$date. ' '.$file."\n"."   " );


fclose($f);

?>