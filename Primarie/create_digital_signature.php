<html>
<head>

<title> Server Primarie Oras Baicoi </title>
<link rel="stylesheet" type="text/css" href="styleserverprimarie.css" />
<link href="./jquery.signaturepad.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="./numeric-1.2.6.min.js"></script> 
<script src="./bezier.js"></script>
<script src="./jquery.signaturepad.js"></script> 
<script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
<script src="./json2.min.js"></script>

<style type="text/css">
			
			#btnSaveSign {
				color: #fff;
				background: #f99a0b;
				padding: 5px;
				border: none;
				border-radius: 5px;
				font-size: 20px;
				margin-top: 10px;
			}
			#signArea{
				width:304px;
				margin: 50px auto;
			}
			.sign-container {
				width: 60%;
				margin: auto;
			}
			.sign-preview {
				width: 150px;
				height: 50px;
				border: solid 1px #CFCFCF;
				margin: 10px 5px;
			}
			.tag-ingo {
				font-family: cursive;
				font-size: 12px;
				text-align: left;
				font-style: oblique;
			}
		</style>
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

	<div id="signArea" >
			<h2 class="tag-ingo">Put signature below,</h2>
			<div class="sig sigWrapper" style="height:auto;">
				<div class="typed"></div>
				<canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
			</div>
		</div>
		<form action="certificat.php">
		<button type ="submit" id="btnSaveSign" name="btnSaveSign">Save Signature</button>
		</form>
		
		<script>
			$(document).ready(function() {
				$('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
			});
			
			$("#btnSaveSign").click(function(e){
				html2canvas([document.getElementById('sign-pad')], {
					onrendered: function (canvas) {
						var canvas_img_data = canvas.toDataURL('image/png');
						var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
						$.ajax({
							url: 'save_sign.php',
							data: { img_data:img_data },
							type: 'post',
							dataType: 'json',
							success: function (response) {
							   window.location.reload();
							}
						});
					}
				});
			});
		  </script> 


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