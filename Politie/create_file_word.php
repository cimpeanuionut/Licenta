<?php

$pre_file_name = $_POST['name'];

$ext = ".doc";

$file_name = $pre_file_name.$ext;

fopen($file_name,'w');  


?>
<?php include ('headerserverpolitie.php'); ?>




<div id="container">
<div id="content">
<br/><br/>
<center>

<form action="edit_file_word.php" method="POST">
	Enter Text:<br><textarea name="edit" cols="100" rows="20"></textarea><p>
	<input type="hidden" name="file_name" value="<?php echo $file_name; ?>">
	<input type="submit" name="submit" id="submit" value="Save">
</form>
</center>
</div><!--content-->


</div><!--container-->
<?php include ('footerserverpolitie.php'); ?>