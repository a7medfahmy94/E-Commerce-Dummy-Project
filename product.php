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

if(isset($_POST["OK"])){
	$id = $_POST["id"];
	$name = $_POST["name"];
	$description = $_POST["description"];
	$p_quantity = $_POST["p_quantity"];
	$price = $_POST["price"];
	$category = $_POST["category"];
	$subcategory = $_POST["subcategory"];
	$visible = $_POST["visible"];
	$picture = $_POST["picture"];

	if((!empty($id)) && (!empty($name)) && (!empty($description)) && 
		(!empty($p_quantity)) && (!empty($price)) && (!empty($category)) && 
		(!empty($subcategory)) && (!empty($visible)) && (!empty($picture))){

		$sql = "INSERT INTO product ( $id , $name , $description , $p_quantity , $price , $category ,
																		 $subcategory , $visible  , $picture)";
		echo "Record Inset successfully";
	}
	else if (empty($id)){
		echo "<p> Enter id </p>" ;
	}
	else if (empty($name)){
		echo "<p> Enter name </p>" ;
	}
	else if (empty($description)){
		echo "<p> Enter description </p>" ;
	}
	else if (empty($p_quantity)){
		echo "<p> Enter p_quantity </p>" ;
	}
	else if (empty($price)){
		echo "<p> Enter price </p>" ;
	}
	else if (empty($category)){
		echo "<p> Enter category </p>" ;
	}
	else if (empty($subcategory)){
		echo "<p> Enter subcategory </p>" ;
	}
	else if (empty($visible)){
		echo "<p> Enter visible </p>" ;
	}	
	else if (empty($picture)){
		echo "<p> Enter picture </p>" ;
	}

}
?>

<html>
	<header>
		<title> Inset product </title>
		<b> Inset product </b> 
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
 			picture <br>
 			<input name = "	picture" type = "file">
 			<br>
 			<br>
 			<input type = "submit" name = "OK" value = "Insert"> 

 	 	</form>

 	</body>

</html>