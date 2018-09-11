<?php
include('inc_politie/db_politie.php');

if (isset($_POST['submit'])){
	
	$doc_name = $_POST['doc_name'];
	
	$name = $_FILES['myfile']['name'];
	$tmp_name = $_FILES['myfile']['tmp_name'];
	$file_ext = explode('.',$name);
	$file_ext = strtolower(end($file_ext));
	$allowed = array('docx','doc');
	if (in_array($file_ext, $allowed)) {
		
		
			if ($name){
	
		$location = "Documentwordpol/$name";
		move_uploaded_file($tmp_name, $location);
		$query = mysqli_query($con,"INSERT INTO word(name,path) VALUES('$doc_name','$location')");
		header('location:documentewordpolitie.php');
		
	}
					
	}
	
	else
		die("Please select a Word document ");
}

?>

<?php include ('headerserverpolitie.php'); ?>

<div id="container">
<div id="content">
<br/><br/>
<center>
	<form action="upload_form_doc_politie.php" method="post" enctype="multipart/form-data">
	<label>Document Name </label>
	<input type="text" name="doc_name">
	<input type="file" name="myfile">
	<input type="submit" name="submit" value="Upload">
	</form>
</center>
</div><!--content-->


</div><!--container-->
<?php include ('footerserverpolitie.php'); ?>