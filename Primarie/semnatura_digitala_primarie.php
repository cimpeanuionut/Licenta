<?php  
 $connect = mysqli_connect("localhost", "root", "", "primarie");  
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "SELECT * FROM semnaturi WHERE semnatura='$file'";	  
	  $result = mysqli_query($connect , $query);
		if ((mysqli_num_rows($result) ==1)) {
			
			
			header("location:http://localhost/Primarie/primapaginaserverprimarie.php");
			
			
		}else
		{
			
			echo '<script>alert("Invalid Signature")</script>';
		
		} 
 }  
 ?> 
<html>
<head>

<title> Server Politie Oras Baicoi </title>
<link rel="stylesheet" type="text/css" href="styleserverprimarie.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body vlink="ff06df">
<div id="header"><center><br/>
<IMG SRC="image_server_primarie/primarieserver1" width="450" height="250"/>
<IMG SRC="image_server_primarie/primariaserver3" width="450" height="250"/></center>
<br/><br/>
</div><!--header-->

<div id ="navigation">

<ul>	
	<li><a href="http://localhost/Primarie/index.php">Inapoi la site-ul politiei</a></li>
	
</ul>


</div><!--navigation-->

<div id="container">
<div id="content">
<br/><center>


			
			<br /><br />  
            <h3 align="center">Valideaza-ti semnatura si acceseaza server-ul interoperabil</h3>  
                <br />  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br />  
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                <br />  
                <br />
                


<ul><li><a href = "create_digital_signature.php"> Inregistreaza-ti semnatura</a></li></ul>
</center>
</div><!--content-->
</div><!--container-->

<div id="footer">

<ul>
	
	<li><a href="http://localhost/Primarie/index.php">Inapoi la site-ul politiei</a></li>
	
</ul>	



</div><!--footer-->





</body>
</html>
<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  