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

if (isset($_POST["OK"])){
	$name = $_SESSION['nameOfProduct'];
	if (!empty($_POST["id"])){
		$id = $_POST["id"];
		$sql = "UPDATE product SET id = $id WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "Record updated successfully";
		}
	  else {
    	echo "Error updating record: " . $conn->error;
		}
	}
	if (!empty($_POST["name"])){
		$name1 = $_POST["name"];
		$sql = "UPDATE product SET name = $name1 WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "Record updated successfully";
		}
	  else {
    	echo "Error updating record: " . $conn->error;
		}
	}
	if (!empty($_POST["description"])){
		$description = $_POST["description"];
		$sql = "UPDATE product SET description = $description WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "Record updated successfully";
		}
	  else {
    	echo "Error updating record: " . $conn->error;
		}
	}
	if (!empty($_POST["p_quantity"])){
		$p_quantity = $_POST["p_quantity"];
		$sql = "UPDATE product SET p_quantity = $p_quantity WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "Record updated successfully";
		}
	  else {
    	echo "Error updating record: " . $conn->error;
		}
	}
	if (!empty($_POST["price"])){
		$price= $_POST["price"];
		$sql = "UPDATE product SET price = $price WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "Record updated successfully";
		}
	  else {
    	echo "Error updating record: " . $conn->error;
		}
	}
	if (!empty($_POST["category"])){
		$category = $_POST["category"];
		$sql = "UPDATE product SET category = $category WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "Record updated successfully";
		}
	  else {
    	echo "Error updating record: " . $conn->error;
		}
	}
	if (!empty($_POST["subcategory"])){
		$subcategory = $_POST["subcategory"];
		$sql = "UPDATE product SET subcategory = $subcategory WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "Record updated successfully";
		}
	  else {
    	echo "Error updating record: " . $conn->error;
		}
	}
	if (!empty($_POST["visible"])){
		$visible = $_POST["visible"];
		$sql = "UPDATE product SET visible = $visible WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "Record updated successfully";
		}
	  else {
    	echo "Error updating record: " . $conn->error;
		}
	}
}


?>

<html>
	<header>
		<title> update product </title>
		<b> update product </b> 
 	</header>

 	<body>

 		<form action = "product.php" method = "post">
 			id <br>
 			<input name = "id" type = "text">
 			<br>
 			name <br>
 			<input name = "name" type = "text">
 			<br>
 			description <br>
 			<input name = "description" type = "text">
 			<br>
 			p_quantity <br>
 			<input name = "p_quantity" type = "text">
 			<br>
 			price <br>
 			<input name = "price" type = "text">
 			<br>
 			category <br>
 			<input name = "category" type = "text">
 			<br>
 			subcategory <br>
 			<input name = "subcategory" type = "text">
 			<br>
 			visible <br>
 			<input name = "visible" type = "text">
 			<br>
 			<br>
 			<input type = "submit" name = "OK" value = "Update"> 

 	 	</form>

 	</body>

</html>