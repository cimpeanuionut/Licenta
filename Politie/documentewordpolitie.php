<?php
include('inc_politie/db_politie.php');

$sql = "SELECT * FROM word";
$res = mysqli_query($con,$sql);
?>



<?php include ('headerserverpolitie.php'); ?>




<div id="container">
<div id="content">
<br/><br/>
<center>

<form action="create_file_word.php" method="POST">
	File Name: <input type="text" id="name" name="name" > <p>
	<input type="submit" name="submit" id="submit" value="Create File">
	

</form>
<p>
<h2>Files</h2>

<?php
$full_path=".";


$dir =@opendir($full_path) or die("Unable to open directory");
while($file= readdir($dir))
{
if($file == "." || $file == ".." || $file == "documentewordpolitie.php" || $file == "arhivezipsaurarpolitie.php" || $file =="create_file_word.php"
|| $file =="delete_word.php"|| $file =="documentepdfpolitie.php"|| $file =="edit_file_word.php"|| $file =="edit_word.php"|| $file =="footerserverpolitie.php"
|| $file =="headerserverpolitie.php"|| $file =="primapaginaserverpolitie.php"|| $file =="styleserverpolitie.css" || $file =="upload_form_doc_politie.php"
|| $file =="inc_politie"|| $file =="Documents_politie" || $file =="delete_pdf_politie.php"|| $file =="download_pdf_politie.php" || $file =="upload_pdf_politie.php"
|| $file =="delete_arhive_politie.php"|| $file =="download_arhive_politie.php"|| $file =="upload_arhive_politie.php" || $file =="Accesorii.php"
|| $file =="Consumul de droguri.php"|| $file =="contact.php"|| $file =="control_server_politie.php"|| $file =="Copiii si circulatia.php"|| $file =="Fisiere atasate1.php"
|| $file =="footer.php"|| $file =="Furturi de autovehicule.php"|| $file =="Galerie Foto.php"|| $file =="header.php"|| $file =="Informatii Generale.php"
|| $file =="ip_politie.txt"|| $file =="index.php"|| $file =="Prevenirea Criminalitatii.php"|| $file =="Prevenirea Inselaciunilor.php"|| $file =="Image Server"
|| $file =="Image"|| $file =="SERVICIUL CAZIER JUDICIAR, STATISTICA SI EVIDENTE OPERATIVE.php"|| $file =="Serviciul Criminalistic.php"|| $file =="Serviciul de Investigatii Criminale.php"
|| $file =="Serviciul de Ordine Publica.php"|| $file =="Serviciul Rutier.php"|| $file =="Sfaturi pentru parinti.php"|| $file =="style.css"|| $file =="stylefont.css"
|| $file =="Traficul de persoane.php"|| $file =="Uniforma de ceremonie.php"|| $file =="Uniforma de reprezentare.php"|| $file =="Uniforma de serviciu.php"|| $file =="Violenta si agresiunea.php"
|| $file =="register_server_politie.php" || $file =="login_server_politie.php" || $file == "Notificare_politie.php" || $file == "Notificare_politie_stergere.php" || $file == "Fisier_notificari_politie.txt"
|| $file == "Notificari_doc_word.php" || $file == "Notificari_doc_word_stergere.php"  || $file == "pen.cur" || $file == "semnatura_digitala_politie.php" || $file == "angajati_politie.php" || $file == "control_acces_baza_angajati.php" || $file == "acces_baza_angajati.txt"
||$file == "Angajati.xlsx" || $file == "lucru_baza.php" || $file == "PHPExcel.php" || $file == "PHPExcel"|| $file == "action.php"|| $file == "Export.php"|| $file == "fetch.php"
|| $file == "bootstrap.min.css" || $file == "jquery-ui.css" || $file == "jquery-ui.js" || $file == "jquery.min.js" || $file == "Setup Cazier Judiciar.msi" || $file == "Documentwordpol"
|| $file == "download_word_politie.php"|| $file == "delete_word_politie.php"|| $file == "bezier.js"|| $file == "certificat.php"|| $file == "create_digital_signature.php"
|| $file == "doc_signs"|| $file == "jquery.signaturepad.css" || $file == "jquery.signaturepad.js"|| $file == "save_sign.php"|| $file == "json2.min.js" || $file == "numeric-1.2.6.min.js" )
	continue;
echo "<ul><li><a href='$file'>$file</a></li>................<li><a href='edit_word.php?name=$file'>Edit</a></li>................<li><a href='delete_word.php?name=$file'>Delete</a></li></br><br>";
	
}

closedir($dir);
?>

<br/><br/>
<ul><li><a href="upload_form_doc_politie.php">Add new Word Document</a></li></ul><br><br>

	<?php 
	
	while ($row = mysqli_fetch_array($res)){
		$id = $row['id'];
		$name = $row['name'];
		$path = $row['path'];
		
		echo $id. "" . $name . "<ul><li><a href='download_word_politie.php?dow=$path'>Download</a></li>.........................................<li><a href='delete_word_politie.php?del=$path'>Delete</a></li></ul><br>";
		
		include ('Notificare_politie.php'); 
	}
	?>



</center>
<br/>


</div><!--content-->


</div><!--container-->
<?php include ('footerserverpolitie.php'); ?>