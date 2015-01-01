<?php

$servername = "localhost";
$username = "root";
$password = "fahmy1234";
$dbname = "E-Commerce";

#connect database
$conn = new mysqli($servername, $username, $password,$dbname);

#check connect
if( $conn->connect_error ){
  header("location : homePageAdmin.php");
}

$sql = "select * from product";
$result = $conn->query($sql);

$conn->close();



?>

<html>
	<header>
		<title> Edit Products </title>
		<b> Edit Products </b>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 	</header>

 	<body>

	<table class="table table-condensed table-bordered table-striped">
	 <thead>
	 <tr class="Product_List">
	 <td class="id">ID</td>
	 <td class="name">Name</td>
	 <td class="decription">Description</td>
	 <td class="p_quantity">Quantity</td>
	 <td class="price">Price</td>
	 <td class="category">Category</td>
	 <td class="subcategory">Subcategory</td>
	 <td class="visible">Visible</td>
	 <td></td>
	 </tr>
	 </thead>
	 <tbody>
	 	 <?php
			 if($result->num_rows > 0){
			 while($row = $result->fetch_object()){
			 echo '<tr>
				<td>'.$row->id.'</td>
				<td>'.$row->name.'</td>
				<td>'.$row->description.'</td>
				<td>'.$row->p_quantity.'</td>
				<td>'.$row->price.'</td>
				<td>'.$row->category.'</td>
				<td>'.$row->subcategory.'</td>
				<td>'.$row->visible.'</td>
				</tr>';
			 }
		 }
	 ?>
	 </tbody>
	 </table>


 		<a href="new_product.php" class="btn">Insert</a>
 		<br>
 			OR
 		<br>
		Enter ID of product<br>
		<input type = "text" id="IDOfproduct">
		<button onclick="deleteProduct();">Delete</button>


	<script>
	 function deleteProduct(){
	 	var a = parseInt($("#IDOfproduct").val());
	 	$.ajax({
	 		type: "POST",
	 		url: "deleteProduct.php",
	 		data: {
	 			IDOfproduct: a
	 		}
	 	}).done(function(res){
	 		alert(res);
	 		window.location.href = "EditProduct.php";
	 	});
	 }

	</script>

 	</body>
</html>