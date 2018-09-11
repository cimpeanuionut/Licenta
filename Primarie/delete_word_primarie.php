<?php
$file = $_GET['name'];

unlink($file);
include('Notificari_primarie_doc_stergere.php');
echo "File Deleted! <a href='documentewordprimarie.php'>  Click here to continue</a>";
