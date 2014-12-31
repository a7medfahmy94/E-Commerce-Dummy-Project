<?php 
session_start();
$servername = "localhost";
$username = "LeilaSaeed";
$password = "leila";
$dbname = "E-Commerce";

$conn = new mysqli($servername, $username, $password,$dbname);
if(! $conn ){
	die('Could not connect: ' . mysql_error());
}

if( isset($_POST["Insert"]) ){
	$f = 1;
	header('location : homePageOfAdmin.php');
}
else if( isset($_POST["Delete"]) ){
	if (!empty($_POST["nameOfproduct"])){
		$f = 0;
		header('location : homePageOfAdmin.php');
	}

$_SESSION['f'] = $f;
$_SESSION['nameOfproduct'] = $nameOfproduct;
}


?>

<html>
	<header>
		<title> Edit Products </title>
		<b> Edit Products </b> 
 	</header>

 	<body>

 		<form action = "EditProduct.php" method = "post">
 		  <br>
 			<input type = "text" name = "nameOfproduct">
 			<input type = "submit" name = "Insert" value = "Insert" >  
 			<br>
 			OR
 			<br>
 			<input type = "text" name = "nameOfproduct">
 			<input type = "submit" name = "Delete" value = "Delete" >  
 			
 		</form>

 	</body>

</html>