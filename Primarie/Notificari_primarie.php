<?php

date_default_timezone_set('Europe/Bucharest');


$date = date('l, jS F H:i');
$f =fopen('Fisier_notificari_primarie.txt', 'a');
fwrite($f,'A fost incarcat un fisier la date '.$date. ' in  '.$path."\n"."   " );


fclose($f);

?>