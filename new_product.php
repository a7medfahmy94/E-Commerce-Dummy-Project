<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "fahmy1234";
$dbname = "E-Commerce";

$conn = new mysqli($servername, $username, $password,$dbname);

#check connect
if( $conn->connect_error ){
  header("location : homePageAdmin.php");
}

if(isset($_POST["OK"])){
	$id = $_POST["id"];
	$name = $_POST["name"];
	$description = $_POST["description"];
	$quantity = $_POST["quantity"];
	$price = $_POST["price"];
	$category = $_POST["category"];
	$subcategory = $_POST["subcategory"];
	$visible = $_POST["visible"];

	$sql = "INSERT INTO product (name,description,p_quantity,price,category,subcategory,visible) VALUES( '$name' , '$description' , $quantity , $price , '$category' ,
																	 '$subcategory' , $visible)";
	if($conn->query($sql)==true){
		echo "Success";
	}else{
		echo "Fail";
	}

}
?>

<html>
	<header>
		<title> Insert product </title>
		<link rel="stylesheet" href="css/bootstrap.css">
 	</header>

 	<body style="margin-left: 12px;">
 		<h1>Insert Product</h1>
		<a class="btn" href="homePageAdmin.php">Home</a>
 		<form action = "new_product.php" name="newProduct" onsubmit="return beforeSubmit()" method = "post">

 			name <br>
 			<input name = "name" type = "text">
 			<br>
 			description <br>
 			<input name = "description" type = "text">
 			<br>
 			Quantity <br>
 			<input name = "quantity" type = "number">
 			<br>
 			price <br>
 			<input name = "price" type = "number">
 			<br>
 			category <br>
 			<input name = "category" type = "text">
 			<br>
 			subcategory <br>
 			<input name = "subcategory" type = "text">
 			<br>
 			visible <br>
 			<input name = "visible" type = "number">
 			<br>
 			<input type = "submit" name = "OK" value = "Insert">

 	 	</form>

	<script>
	 function beforeSubmit() {
    // validate name , name don't be null or empty
    var name = document.forms["newProduct"]["name"].value;
    if (name==null || name=="") {
        alert("Name must be filled out");
        return false;
    }

    // validate description,don't be null or empty
    var description = document.forms["newProduct"]["description"].value;
    if (description==null || description=="") {
        alert("description must be filled out");
        return false;
    }

    //validate quantity ,don't be null or empty
    var quantity = document.forms["newProduct"]["quantity"].value;
    if (quantity==null || quantity=="") {
        alert("quantity must be filled out");
        return false;
    }
    // validate price ,don't be null or empty
    var price = document.forms["newProduct"]["price"].value;
    if (price==null || price=="") {
        alert("price must be filled out");
        return false;
    }
    // validate category,don't be null or empty
    var category = document.forms["newProduct"]["category"].value;
    if (category==null || category=="") {
        alert("category must be filled out");
        return false;
    }
     // validate subcategory,don't be null or empty
    var subcategory = document.forms["newProduct"]["subcategory"].value;

    if (subcategory==null || subcategory=="") {
        alert("subcategory must be filled out");
        return false;
    }
    // sure that visible is given
    var visible = document.forms["newProduct"]["visible"].value;
    if (visible==null || visible=="") {
        alert("visible must be filled out");
        return false;
    }
    return true;
}
</script>

 	</body>

</html>