<?php 

$servername = "localhost";
$username = "LeilaSaeed";
$password = "leila";
$dbname = "E-Commerce";

$conn = new mysqli($servername, $username, $password,$dbname);


if( isset($_POST["Log in"]) ){

	if(empty($_POST["email"])){
		echo "<p> Enter email </p>" ;
	}

	else if(empty($_POST["pass"])){
		echo "<p> Enter password </p>";
	}

	else{
		if(! $conn ){
  		die('Could not connect: ' . mysql_error());
		}	
		$sql = "SELECT email , password FROM customer";
		$result = mysqli_query($conn , $sql);
		if(! $query ){
		  die('Could not get data: ' . mysql_error());
		}
		header("location: list_application.php");	
	}

}
elseif (isset($_POST["Sign up"])) {
	#header("location: SignUp.php");

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
 			<input name = "pass" type = "text">
 			<br>
 			<br>
 			<input type = "submit" name = "Log in" value = "Log in" >  
 			OR  
 			<input type = "submit" name = "Sign up" value = "Sign up"> 
 		</form>

 	</body>

</html>