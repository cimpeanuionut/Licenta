<?php
include('inc_primarie/db_primarie.php');

$sql = "SELECT * FROM pdf";
$res = mysqli_query($con,$sql);
?>

<?php include ('headerserverprimarie.php'); ?>
<div id="container">
<div id="content">
<br/><br/>
<center>
<ul><li>
<a href="upload_pdf_primarie.php">Add new PDF Document</a></li></ul><br><br>
	<?php 
	while ($row = mysqli_fetch_array($res)){
		$id = $row['id'];
		$name = $row['name'];
		$path = $row['path'];
		
		echo $id. "" . $name . "</br><ul><li><a href='download_pdf_primarie.php?dow=$path'>Download</a></li>.....................................<li><a href='delete_pdf_primarie.php?del=$path'>Delete</a></li></ul><br>";
		include ('Notificari_primarie.php');
	}
	?>
</center>
</div><!--content-->
</div><!--container-->

<?php include ('footerserverprimarie.php'); ?>


</body>
</html>
