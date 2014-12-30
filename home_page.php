<?php 
session_start();
$servername = "localhost";
$username = "LeilaSaeed";
$password = "leila";
$dbname = "E-Commerce";

#connect database
$conn = new mysqli($servername, $username, $password,$dbname);

#check if click on log in
if( isset($_POST["LogIn"]) ){

	#check if set email
	if(empty($_POST["email"])){
		echo "<p> Enter email </p>" ;
	}
	
	#check if set password
	else if(empty($_POST["pass"])){
		echo "<p> Enter password </p>";
	}

	else{
		
		#check if connect database true
		if(! $conn ){
  		die('Could not connect: ' . mysql_error());
		}	
		
		#select row of user
		$sql = "SELECT email , password FROM customer";
		
		#get id of user
		$id = "SELECT id FROM customer where email = '" . $_POST["email"] . "' and password = '". $_POST["pass"] . "'";		$result = mysqli_query($conn , $sql);
		
		#check if this mail & pass already in sql 
		if(! $result ){
		  die('Could not get data: ' . mysql_error());
		}
		header("location: list_application.php");	
	}
	$_SESSION['id'] = $id;
}
?>

<html>
	<header>
		<title> customer Page </title>
		<b> Home Page </b> 
 	</header>

 	<body>

 		<form action = "home_page.php" method = "post">
 			email <br>
 			<input name = "email" type = "text">
 			<br>
 			password <br>
 			<input name = "pass" type = "password">
 			<br>
 			<br>
 			<input type = "submit" name = "LogIn" value = "LogIn" >  
 			<br>
 			<br>
 			OR  
 		</form>
 		<button onclick="Signup()"> SignUp </button>
 		<script>
		function Signup() {
    	window.location.href = 'SignUp.html';
		}
		</script>
 	</body>

</html>