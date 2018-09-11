<?php include ('headerserverprimarie.php'); ?>
<?php
$dsn = 'mysql:host=localhost;dbname=primarie';
	$username = 'root';
	$password = '';
	try{
		$con = new PDO($dsn,$username,$password);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	}catch (Exception $ex){
		echo 'Not Connected' .$ex->getMessage();
	}
	
	
	$name = '';
	$prenume = '';
	$email = '';
	$adresa = '';
	$telefon = '';
	
	function getPosts()
	{
		$posts = array();
		$posts[1] = $_POST['name'];
		$posts[2] = $_POST['prenume'];
		$posts[3] = $_POST['email'];
		$posts[4] = $_POST['adresa'];
		$posts[5] = $_POST['telefon'];
		
		return $posts;
	}
	
	if(isset($_POST['search']))
	{
		$data = getPosts();
		if (empty($data[1]))
		{
			
			$_SESSION['message'] = "Enter the User Name to Search";
		} else{
			$searchStmt = $con->prepare('SELECT * FROM angajati_primarie WHERE name= :name');
			$searchStmt->execute(array(
							':name'=>$data[1]
			));
			if($searchStmt){
			$user = $searchStmt->fetch();
			if(empty($user))
			{
				$_SESSION['message'] = "No data for this Name";
			}
			
			$name 		=   $user[1];
			$prenume	=   $user[2];
			$email 		=   $user[3];
			$adresa 	=   $user[4];
			$telefon 	=   $user[5];
			}
		}	
	}
	
	if(isset($_POST['insert']))
	{
		$data = getPosts();
	if (empty($data[1]) || empty($data[2]) || empty($data[3])|| empty($data[4])|| empty($data[5]))
		{
			$_SESSION['message'] = "Enter the User data to Insert";
		} else{
			$insertStmt = $con->prepare('INSERT INTO angajati_primarie (name, prenume, email, adresa, telefon ) VALUES(:name,:prenume,:email , :adresa, :telefon)');
			$insertStmt->execute(array(
							':name'=>  $data[1],
							':prenume'=> $data[2],
							':email'=> $data[3],
							':adresa'=> $data[4],
							':telefon'=> $data[5],
							
			));
			if($insertStmt){
			
			
				$_SESSION['message'] = "Data Insert";
			}
			
			}
		}
		
		if(isset($_POST['update']))
	{
		$data = getPosts();
	if ( empty($data[1]) || empty($data[2]) || empty($data[3])|| empty($data[4])|| empty($data[5]))
		{
			$_SESSION['message'] = "Echo the User data to Update";
		} else{
			$updateStmt = $con->prepare('UPDATE  angajati_primarie SET name = :name, prenume = :prenume,email = :email,  adresa =:adresa, telefon =:telefon WHERE name = :name');
			$updateStmt->execute(array(
							
							':name'=>  $data[1],
							':prenume'=> $data[2],
							':email'=> $data[3],
							':adresa'=> $data[4],
							':telefon'=> $data[5],
			));
			if($updateStmt){
			
			
				$_SESSION['message'] = "Data Update";
			}
			
			}
		}	
		
		if(isset($_POST['delete']))
	{
		$data = getPosts();
	if (empty($data[1]))
		{
			$_SESSION['message'] = "Enter the User Name to delete";
		} else{
			$deleteStmt = $con->prepare('DELETE FROM  angajati_primarie WHERE name = :name');
			$deleteStmt->execute(array(
							':name'=>    $data[1]							
			));
			if($deleteStmt){
			
			
				$_SESSION['message'] = "Data Delete";
			}
			
			}
		}	
			
	

?>
<?php
$connect = mysqli_connect("localhost", "root", "", "primarie");
 include("PHPExcel/IOFactory.php");
 
 if (isset($_POST['submit'])){
	
	
	$name = $_FILES['myfile']['name'];
	$tmp_name = $_FILES['myfile']['tmp_name'];
	$file_ext = explode('.',$name);
	$file_ext = strtolower(end($file_ext));
	$allowed = array('xlsx' , 'xls');
	if (in_array($file_ext, $allowed)) {
	$objPHPExcel = PHPExcel_IOFactory::load('Angajati.xlsx');
	foreach($objPHPExcel->getWorksheetIterator() as $worksheet)
 {
	 $highestRow = $worksheet->getHighestRow();
	 for ($row=2; $row<=$highestRow; $row++)
	 {
		
		$name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
		$prenume = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
		$email = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
		$adresa = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
		$telefon = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
		$sql = "INSERT INTO angajati_primarie(name, prenume,email, adresa,telefon) VALUES ( '" .$name."','" .$prenume."','" .$email."','" .$adresa."','".$telefon."')";
		mysqli_query($connect, $sql);
				
	 }	 
	 
 } 
 $_SESSION['message'] = "Documentul Excel a fost incarcat cu succes in baza de date";
	} else
		$_SESSION['message'] = "Please select a Excel document";
 }
?>
<div id="container">
<div id="content">
<center>
<?php

	if(isset($_SESSION['message'])){
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>
<br/><br/>
	<form action="angajati_primarie.php" method="POST">
	
		
		<input type="text" name="name" placeholder="nume" value="<?php echo $name;?>"><br><br>
		<input type="text" name="prenume" placeholder="prenume"value="<?php echo $prenume;?>"><br><br>
		<input type="text" name="email" placeholder="email"value="<?php echo $email;?>"><br><br>
		<input type="text" name="adresa" placeholder="adresa"value="<?php echo $adresa;?>"><br><br>
		<input type="text" name="telefon" placeholder="telefon"value="<?php echo $telefon;?>"><br><br>
		
		
		<input type="submit" name="insert" value="Insert">
		<input type="submit" name="update" value="Update">
		<input type="submit" name="delete" value="Delete">
		<input type="submit" name="search" value="Search">
		</br><p>Alege unul dintre butoanele de mai sus pentru a lucra cu baza de date</p></br>
		<p> Selecteaza un document Excel pentru a-l incarca in baza de date cu lucratorii din cadrul politiei</p><br/>
	</form>
	
	<form action="angajati_primarie.php" method="post" enctype="multipart/form-data">
	<input type="file" name="myfile">
	<input type="submit" name="submit" value="Upload">
	</form>
	<br/>
	<ul>
	<li><a href="lucru_baza.php">Afisare Baza</a></li>
	</ul>
</center>	


</div><!--content-->


</div><!--container-->
<?php include ('footerserverprimarie.php'); ?>