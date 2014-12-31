<?php 
session_start();
$servername = "localhost";
$username = "LeilaSaeed";
$password = "leila";
$dbname = "E-Commerce";

$conn = new mysqli($servername, $username, $password,$dbname);

$f = $_SESSION['f'];
$nameOfproduct = $_SESSION['nameOfproduct'];

if( isset($_POST["Log in"]) ){

	if(empty($_POST["username"])){
		echo "<p> Enter username </p>" ;
	}

	else if(empty($_POST["pass"])){
		echo "<p> Enter password </p>";
	}

	else{
		if(! $conn ){
  		die('Could not connect: ' . mysql_error());
		}	
		$sql = "SELECT username , password FROM admin";
		$result = mysqli_query($conn , $sql);
		if(! $query ){
		  die('Could not get data: ' . mysql_error());
		}
		else{
			if ($f == 1){
				header("location : product.php");
			}
			else if ($f == 0){
				$sql = "DELETE FROM product where  name = '$nameOfproduct'" ;
				if ($conn->query($sql) === TRUE) {
  				echo "Record deleted successfully";
				}
				else {
  				echo "Error deleting record: " . $conn->error;
				}
			}
		}
	}

}

?>


<html>
	<header>
		<title> Admin Page </title>
		<b> Home Page </b>
 	</header>

 	<body>
 		
 		<form action = "homePageOfAdmin.php" method = "post">
 			username <br>
 			<input name = "username" type = "text">
 			<br>
 			password <br>
 			<input name = "pass" type = "text">
 			<br>
 			<br>
 			<input type = "submit" name = "Log in" value = "Log in" >  
 		</form>

 	</body>

</html>