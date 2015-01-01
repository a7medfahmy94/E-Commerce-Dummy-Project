<?php
session_start();
$servername = "localhost";
$username = "LeilaSaeed";
$password = "leila";
$dbname = "E-Commerce";

$conn = new mysqli($servername, $username, $password,$dbname);

#check connect
if( $conn->connect_error ){
  $conn->close();
  echo "Could not connect ";
  header("location : homePageAdmin.php");
}

$sql = "SELECT * FROM product";

#check if get this coloum 
$result = $conn->query($sql);

if( $result->num_rows <= 0 ){
	echo"Could not get data";
  $conn->close();
	header("location : homePageAdmin.php");
}
?>
<?php #show data of product table ?>
<html>
<body>
  <h2>Product</h2>

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

</body>
</html>

<?php

if (isset ($_POST["addProduct"])){
	header("location : product.php");
}
else if (isset ($_POST["changeProduct"])){
  
  #check if set name
	if (empty($_POST["nameOfProduct"])){
		echo "Enter name of product";
	}
	else {
		header("location : update_product.php");
    $_SESSION['nameOfProduct'] = $nameOfProduct;
	}

}
?>

<html>
	<header>
		<title> Store Page </title>
		<b> Store Page </b> 
 	</header>

 	<body>
 		<form action = "Store_Page.php" method = "post">
 			<br>
 			<input type = "submit" name = "addProduct" value = "addProduct" > 
 			<br>
 			OR 
 			<br>
 			<input name = "nameOfProduct" type = "text">
 			<input type = "submit" name = "changeProduct" value = "changeProduct" > 
 		</form>

 	</body>

</html>