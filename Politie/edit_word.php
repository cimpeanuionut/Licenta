<?php
$file_name = $_GET['name'];

$file_read = fopen($file_name, "r");
$contents = fread($file_read, filesize($file_name));
fclose($file_read);
?>

<?php include ('headerserverpolitie.php'); ?>

<div id="container">
<div id="content">
<br/><br/>
<center>
<form action="edit_file_word.php" method="POST">
	<textarea name="edit" cols="100" rows="20"><?php echo $contents;  ?></textarea><p>
	<input type="hidden" name="file_name" value="<?php echo $file_name;   ?>">
	<input type="submit" name="submit" id="submit"  value="Save">
</form>
</center>
</div><!--content-->


</div><!--container-->
<?php include ('footerserverpolitie.php'); ?>