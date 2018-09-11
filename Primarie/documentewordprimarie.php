<?php
include('inc_primarie/db_primarie.php');

$sql = "SELECT * FROM word";
$res = mysqli_query($con,$sql);
?>

<?php include ('headerserverprimarie.php'); ?>
<div id="container">
<div id="content">

<br/><br/>
<center>
<form action="create_file_word_primarie.php" method="POST">
	File Name: <input type="text" id="name" name="name"><p>
	<input type="submit" name="submit" id="submit" value="Create File">
</form>
<p>
<h2>Files</h2>

<?php
$full_path=".";


$dir =@opendir($full_path) or die("Unable to open directory");
while($file= readdir($dir))
{
if($file == "." || $file == ".." || $file == "documentewordprimarie.php" || $file == "arhivezipsaurarprimarie.php" || $file =="create_file_word_primarie.php"
|| $file =="delete_word_primarie.php"|| $file =="documentepdfprimarie.php"|| $file =="edit_file_word_primarie.php"|| $file =="edit_word_primarie.php"|| $file =="footerserverprimarie.php"
|| $file =="headerserverprimarie.php"|| $file =="primapaginaserverprimarie.php"|| $file =="styleserverprimarie.css" || $file =="upload_form_doc_primarie.php"
|| $file =="upload_pdf_primarie.php"|| $file =="download_pdf_primarie.php"|| $file =="delete_pdf_primarie.php"|| $file =="inc_primarie"|| $file =="Documents_primarie" 
|| $file =="delete_arhive_primarie.php"|| $file =="upload_arhive_primarie.php"|| $file =="download_arhive_primarie.php" || $file =="Acte Necesare.php" || $file =="Bugete.php"
|| $file =="Comunicate.php"|| $file =="Contact.php"|| $file =="Declaratii.php"|| $file =="DESPRE ORAS.php"|| $file =="Dispozitii.php"|| $file =="footer.php"
|| $file =="control_server_primarie.php"|| $file =="Formulare Standard.php"|| $file =="Galerie Foto.php"|| $file =="header.php"|| $file =="Hotarari.php"
|| $file =="ip_primarie.txt" || $file =="Licitatii.php" || $file =="Prima Pagina.php"|| $file =="sidebar.php"|| $file =="style.css"
|| $file =="stylegaleriefoto.css" || $file =="stylesidebar.css" || $file=="Declaratii.php" ||$file=="Image"||$file=="Image_server_primarie"
||$file=="login_server_primarie.php"||$file=="register_server_primarie.php" || $file == "Fisier_notificari_primarie.txt" || $file == "index.php" || $file == "Notificari_primarie.php"
|| $file == "Notificari_primarie_doc.php" || $file == "Notificari_primarie_doc_stergere.php" || $file == "Notificari_primarie_stergere.php" || $file == "pen.cur" || $file == "json2.min.js" 
|| $file == "semnatura_digitala_primarie.php"|| $file == "acces_baza_angajati.txt" || $file == "control_acces_baza_angajati.php" || $file == "PHPExcel.php"|| $file == "PHPExcel"
|| $file == "lucru_baza.php" || $file == "angajati_primarie.php" || $file == "Angajati.xlsx" || $file == "action.php"|| $file == "Export.php"|| $file == "fetch.php"
|| $file == "bootstrap.min.css" || $file == "jquery-ui.css" || $file == "jquery-ui.js" || $file == "jquery.min.js" || $file == "download_word_primarie.php" || $file == "delete_word2_primarie.php"
|| $file == "Documentwordprimarie" || $file == "bezier.js"|| $file == "certificat.php"|| $file == "create_digital_signature.php"
|| $file == "doc_signs"|| $file == "jquery.signaturepad.css" || $file == "jquery.signaturepad.js"|| $file == "save_sign.php"|| $file == "json2.min.js" || $file == "numeric-1.2.6.min.js")
	continue;
echo "<ul><li><a href='$file'>$file</a></li>................<li><a href='edit_word_primarie.php?name=$file'>Edit</a></li>................<li><a href='delete_word_primarie.php?name=$file'>Delete</a></li></br><br>";
	
}

closedir($dir);
?>

<br/><br/>
<ul><li><a href="upload_form_doc_primarie.php">Add new Word Document</a></li></ul><br><br>

	<?php 
	
	while ($row = mysqli_fetch_array($res)){
		$id = $row['id'];
		$name = $row['name'];
		$path = $row['path'];
		
		echo $id. "" . $name . "<ul><li><a href='download_word_primarie.php?dow=$path'>Download</a></li>.........................................<li><a href='delete_word2_primarie.php?del=$path'>Delete</a></li></ul><br>";
		
		include ('Notificari_primarie.php'); 
	}
	?>

</center>
<br/>

</div><!--content-->
</div><!--container-->

<?php include ('footerserverprimarie.php'); ?>


</body>
</html>
