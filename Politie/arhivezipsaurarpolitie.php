<?php
include('inc_politie/db_politie.php');

$sql = "SELECT * FROM arhive";
$res = mysqli_query($con,$sql);
?>

<?php include ('headerserverpolitie.php'); ?>

<div id="container">
<div id="content">
<br/><br/>
<center>
<ul><li>
<a href="upload_arhive_politie.php">Add new Rar/Zip Document</a></li></ul><br><br>
	<?php 
	while ($row = mysqli_fetch_array($res)){
		$id = $row['id'];
		$name = $row['name'];
		$path = $row['path'];
		
		echo $id. "" . $name . "<ul><li><a href='download_arhive_politie.php?dow=$path'>Download</a></li>...............................<li><a href='delete_arhive_politie.php?del=$path'>Delete</a></li></ul><br>";
	include ('Notificare_politie.php');
	}
	?>
</center>

</div><!--content-->


</div><!--container-->
<?php include ('footerserverpolitie.php'); ?>