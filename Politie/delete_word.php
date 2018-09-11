<?php
$file = $_GET['name'];

unlink($file);
include ('Notificari_doc_word_stergere.php');

echo "File Deleted! <a href='documentewordpolitie.php'>  Click here to continue</a>";
