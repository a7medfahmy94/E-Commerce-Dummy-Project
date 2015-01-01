<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "fahmy1234";
$dbname = "E-Commerce";

$conn = new mysqli($servername, $username, $password,$dbname);

#connect database
if(! $conn ){
 	echo "Could not connect";
}

if (isset($_POST["OK"])){

	#take inpute of store page
	$name = $_SESSION['nameOfProduct'];

	#check if set id
	if (!empty($_POST["id"])){

		$id = $_POST["id"];

		#update id
		$sql = "UPDATE product SET id = $id WHERE name = $name";

		#check if update record
		if ($conn->query($sql) === TRUE) {
  	  echo "success updating";
		}
	  else {
    	echo "Error updating " . $conn->error;
		}
	}

	#check if set name
	if (!empty($_POST["name"])){
		$name1 = $_POST["name"];

		#update name
		$sql = "UPDATE product SET name = $name1 WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "success updating";
		}
	  else {
    	echo "Error updating " . $conn->error;
		}
	}

	#check if set description
	if (!empty($_POST["description"])){
		$description = $_POST["description"];

		#update description
		$sql = "UPDATE product SET description = $description WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "success updating";
		}
	  else {
    	echo "Error updating" . $conn->error;
		}
	}

	#check if set quantity
	if (!empty($_POST["p_quantity"])){
		$p_quantity = $_POST["p_quantity"];

		#update Quantity
		$sql = "UPDATE product SET p_quantity = $p_quantity WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "success updating";
		}
	  else {
    	echo "Error updating" . $conn->error;
		}
	}

	#check if set price
	if (!empty($_POST["price"])){
		$price= $_POST["price"];

		#update price
		$sql = "UPDATE product SET price = $price WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "success updating";
		}
	  else {
    	echo "Error updating" . $conn->error;
		}
	}

	#check if set category
	if (!empty($_POST["category"])){
		$category = $_POST["category"];

		#update category
		$sql = "UPDATE product SET category = $category WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "success updating";
		}
	  else {
    	echo "Error updating" . $conn->error;
		}
	}

	#check if set subcategory
	if (!empty($_POST["subcategory"])){
		$subcategory = $_POST["subcategory"];

		#update subcategory
		$sql = "UPDATE product SET subcategory = $subcategory WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "Success updating";
		}
	  else {
    	echo "Error updating" . $conn->error;
		}
	}

	#check if set visible
	if (!empty($_POST["visible"])){
		$visible = $_POST["visible"];

		#update visible
		$sql = "UPDATE product SET visible = $visible WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "success updating";
		}
	  else {
    	echo "Error updating " . $conn->error;
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

 		<form action = "update_product.php" method = "post">
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