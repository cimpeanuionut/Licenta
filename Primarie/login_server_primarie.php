<?php
	session_start();
	include('inc_primarie/db_primarie.php');
	
	
	if (isset($_POST['login_btn'])){
		$username = mysqli_real_escape_string($con,$_POST['username']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
	
		
		$password = md5($password);
		$sql = "SELECT * FROM users_primarie WHERE username='$username' AND password='$password'";
		$result = mysqli_query($con , $sql);
		if ((mysqli_num_rows($result) ==1)) {
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			echo $sql;
			header("location:https://cimpeanualex.000webhostapp.com/otp_politie.php");
			
			
		}else
		{
			
			$_SESSION['message'] = "Username/password combination incorrect";
			
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
<form method="post" action="login_server_primarie.php">
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username"class="textInput"></td>
		</tr>
		
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password"class="textInput"></td>
		</tr>
		
		<tr>
			<td></td>
			<td><input type="submit" name="login_btn" value="Login"></td>
		</tr>		
		</table>
</form>		
<p>Daca nu ai un cont,creza-l, pentru a accesa serverul primariei</p>
<ul>
<li><a href="register_server_primarie">Register</a></li>
</ul>
</center>

</div><!--content-->
</div><!--container-->
<?php include ('footerserverprimarie.php'); ?>