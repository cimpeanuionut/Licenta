<?php
$error = "error";

$con = mysqli_connect('localhost', 'id5843086_otp', '12345') or die ($error);
mysqli_select_db($con,'id5843086_otp')or die($error);
session_start();

if (isset($_POST['otp_btn'])){
$OTP = mysqli_real_escape_string($con, $_POST['OTP']);
$sql = "SELECT * FROM otp WHERE otp='$OTP'";
$result = mysqli_query($con , $sql);
if ((mysqli_num_rows($result) ==1)) {
header("location:http://localhost/Primarie/primapaginaserverprimarie.php");
$sql= mysqli_query($con,"DELETE FROM otp WHERE otp='$OTP'");

}else{
$_SESSION['message'] = "OTP combination incorrect";
$sql= mysqli_query($con,"DELETE FROM otp WHERE otp='$OTP'");
}
}

?>
<?php include ('headerserverpolitie.php'); ?>

<div id="container">
<div id="content">
<br/><br/>
<center>
<?php
	if(isset($_SESSION['message'])){
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>

<form method="post" action="otp_primarie.php">
<table>
<tr>
			<td>OTP:</td>
			<td><input type="text" name="OTP"class="textInput"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="otp_btn" value="Validate OTP"></td>
		</tr>
</table>		
</form>	
<ul>
<li><a href="http://localhost/Politie/login_server_politie.php">Logout</a></li>
</ul>
</center>
</div><!--content-->
</div><!--container-->
<?php include ('footerserverpolitie.php'); ?>
	