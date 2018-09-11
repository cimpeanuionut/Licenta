<?php

date_default_timezone_set('Europe/Bucharest');


$date = date('l, jS F H:i');

$f =fopen('Fisier_notificari_primarie.txt', 'a');
fwrite($f,'A fost incarcat fisierul la date de '.$date.' ' .$UploadName."\n"."   " );


fclose($f);

?>