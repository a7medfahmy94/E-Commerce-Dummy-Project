<?php 
session_start();
$servername = "localhost";
$username = "LeilaSaeed";
$password = "leila";
$dbname = "E-Commerce";

$conn = new mysqli($servername, $username, $password,$dbname);


#check if click log in
if( isset($_POST["Log in"]) ){

	#check if set username
	if(empty($_POST["username"])){
		echo " Enter username " ;
	}

	#check if set pass
	else if(empty($_POST["pass"])){
		echo " Enter password ";
	}

	else{
		$f = $_SESSION['f'];
		
		#connect database
		if(! $conn ){
  		echo "Could not connect ";
  		header("location : homePageAdmin.php");
		}	

		$sql = "SELECT username , password FROM admin";

		#check if get admin 
		$result = mysqli_query($conn , $sql);

		#check if get data
		if(! $result ){
		  echo"Could not get data";
		  header("location : homePageAdmin.php");
		}
		else{
			if ($f == 0){
				header("location : Store_Page.php");
			}
			#customer account
			else if ($f == 1){
				header("location: CustomerAccountsPage.php");
			}
			if ($f == 2) {
				header("location: Shipping.php");
			}
			if ($f == 3) {
				header("location: EditProduct.php");	
			}
		}
	}

}

?>


<html>
	<header>
		<title> Admin Page </title>
		<b> log in </b>
 	</header>

 	<body>
 		
 		<form action = "homePageOfAdmin.php" method = "post">
 			username <br>
 			<input name = "username" type = "text">
 			<br>
 			password <br>
 			<input name = "pass" type = "password">
 			<br>
 			<br>
 			<input type = "submit" name = "Log in" value = "Log in" >  
 		</form>

 	</body>

</html>