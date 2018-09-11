<?php
date_default_timezone_set('Europe/Bucharest');


$date = date('l, jS F H:i');
$f =fopen('Fisier_notificari_politie.txt', 'a');
fwrite($f,'A fost incarcat un fisier la data de ' .$date. ' in   '.$path."\n"."   " );


fclose($f);

?>