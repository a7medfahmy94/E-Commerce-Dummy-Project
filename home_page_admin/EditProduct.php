<?php 

$servername = "localhost";
$username = "LeilaSaeed";
$password = "leila";
$dbname = "E-Commerce";

#connect database
$conn = new mysqli($servername, $username, $password,$dbname);

#check connect
if(! $conn ){
	echo "Could not connect ";
  header("location : homePageAdmin.php");
}

if( isset($_POST["Delete"]) ){

	#check if set ID of product 
	if (!empty($_POST["IDOfproduct"])){
		$IDOfproduct = $_POST["IDOfproduct"];

		#delete 2l row
		$sql = "DELETE FROM product where  id = '$IDOfproduct'" ;

		#check if already delete 
		if ($conn->query($sql) == TRUE) {
  		echo "Success deleting";
		}
		else {
  		echo "Error deleting ";
  		header("location : homePageAdmin.php");
		}
	}
}


?>

<html>
	<header>
		<title> Edit Products </title>
		<b> Edit Products </b> 
 	</header>

 	<body>
 		<a href="new_product.php" target="_blank">Inset</a>
 		<br>
 			OR
 		<br>
 		<form action = "EditProduct.php" method = "post">
 			Enter ID of product<br>
 			<input type = "text" name = "IDOfproduct">
 			<input type = "submit" name = "Delete" value = "Delete" >  
 		</form>

 	</body>
</html>