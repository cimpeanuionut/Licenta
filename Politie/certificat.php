<?php  
 $connect = mysqli_connect("localhost", "root", "", "politie");  
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO semnaturi(semnatura) VALUES ('$file')";  
      if(mysqli_query($connect, $query))  
      {  
           header("location:http://localhost/Politie/semnatura_digitala_politie.php");  
      }  
 }  
 ?> 
<html>
<head>

<title> Server Politie Oras Baicoi </title>
<link rel="stylesheet" type="text/css" href="styleserverpolitie.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>

<body vlink="ff06df">
<div id="header"><center><br/>
<IMG SRC="Image Server/politieserver1" width="450" height="250"/>
<IMG SRC="Image Server/politieserver3" width="450" height="250"/></center>
<br/><br/>
</div><!--header-->

<div id ="navigation">

<ul>	
	<li><a href="http://localhost/Politie/index.php">Inapoi la site-ul politiei</a></li>
	
</ul>


</div><!--navigation-->

<div id="container">
<div id="content">
<br/><center>
 <br /><br />  
            <h3 align="center">Insereaza semnatura primita</h3>  
                <br />  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br />  
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                <br />  
                <br />
                
</center>
</div><!--content-->
</div><!--container-->

<div id="footer">

<ul>
	
	<li><a href="http://localhost/Politie/index.php">Inapoi la site-ul politiei</a></li>
	
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