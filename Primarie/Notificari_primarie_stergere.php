<?php
date_default_timezone_set('Europe/Bucharest');


$date = date('l, jS F H:i');

$f =fopen('Fisier_notificari_primarie.txt', 'a');
fwrite($f,'A fost sters un fisier la date de '.$date.' din  '.$path."\n"."   " );


fclose($f);

?>