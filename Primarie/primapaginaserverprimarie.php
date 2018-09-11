<?php
	
	session_start();
	
?>

<?php include ('headerserverprimarie.php'); ?>
<div id="container">
<div id="content">

<br/>
<center>
<h3>Bine ati venit pe serverul primariei orasului Baicoi!</h3><br/>
<p>Selectati una din optiunile de mai jos pentru a lucra pe acest server:</p><br/><br/>
<ul>
	<li><a href="documentewordprimarie.php">Documente Word</a></li><br/><br/><br/>
	<li><a href="documentepdfprimarie.php">Documente PDF</a></li><br/><br/><br/>
	<li><a href="arhivezipsaurarprimarie.php">Arhive Zip/Rar</a></li><br/><br/><br/>
	<li><a href="Fisier_notificari_primarie">Vizualizare notificari avute la server-ul primariei</a></li>
</ul>

</center><br/><br/>
<center><IMG SRC="Image_server_primarie/primariaserver2" width="600" height="300"/></center>


</div><!--content-->
</div><!--container-->

<?php include ('footerserverprimarie.php'); ?>


</body>
</html>