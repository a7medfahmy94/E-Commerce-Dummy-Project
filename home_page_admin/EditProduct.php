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

#check if click on Insert or delete
if( isset($_POST["Insert"]) ){
	#go to Insert product
	header('location : new_product.php');
}
else if( isset($_POST["Delete"]) ){

	#check if set name of product 
	if (!empty($_POST["nameOfproduct"])){
		$nameOfproduct = $_POST["nameOfproduct"];

		#delete 2l row
		$sql = "DELETE FROM product where  name = $nameOfproduct" ;

		#check if already delete 
		if ($conn->query($sql) === TRUE) {
  		echo "Success deleting";
		}
		else {
  		echo "Error deleting ";
  		header("location : homePageAdmin.php");
		}
}


?>

<html>
	<header>
		<title> Edit Products </title>
		<b> Edit Products </b> 
 	</header>

 	<body>

 		<form action = "EditProduct.php" method = "post">
 		  Enter name of product<br>
 			<input type = "text" name = "nameOfproduct">
 			<input type = "submit" name = "Insert" value = "Insert" >  
 		</form>
 		<br>
 			OR
 		<br>
 		<form action = "EditProduct.php" method = "post">
 			Enter name of product<br>
 			<input type = "text" name = "nameOfproduct">
 			<input type = "submit" name = "Delete" value = "Delete" >  
 		</form>

 	</body>
</html>