<?php
	session_start();
	include('inc_primarie/db_primarie.php');
	if (isset($_POST['register_btn'])){
		
		$username = mysqli_real_escape_string($con,$_POST['username']);
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
		$password2 = mysqli_real_escape_string($con,$_POST['password2']);
		
		if($password == $password2){
			$password = md5($password);
			$sql = "INSERT INTO users_primarie(username,email,password)VALUES('$username','$email','$password')";
			mysqli_query($con,$sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location:login_server_primarie.php");
		} else{
			$_SESSION['message'] = "The two passwords do not match";
		}
	}

?>
<?php include ('headerserverprimarie.php'); ?>

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
<form method="post" action="register_server_primarie.php">
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username"class="textInput"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="email" name="email"class="textInput"></td>
		</tr>	
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password"class="textInput"></td>
		</tr>
		<tr>
			<td>Password again</td>
			<td><input type="password" name="password2"class="textInput"></td>
		</tr>	
		<tr>
			<td></td>
			<td><input type="submit" name="register_btn" value="Register"></td>
		</tr>
		</table>
</form>
<br/><br/>
<p>Daca ai cont,click pe butonul Login</p>
<ul>
<li><a href="login_server_primarie">Login</a></li>
</ul>
</center>
</div><!--content-->
</div><!--container-->
<?php include ('footerserverprimarie.php'); ?>