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

$sql = "SHOW TABLES FROM product";
$result = mysqli_query($conn , $sql);

if (!$result) {
   die('Could not get data: ' . mysql_error());
}

while ($row = mysql_fetch_row($result)) {
    echo "Table: {$row[0]}\n";
}

mysql_free_result($result);

if (isset ($_POST["addProduct"])){
	header("location : product.php");
}
else if (isset ($_POST["changeProduct"])){
	if (empty($_POST["nameOfProduct"])){
		echo "Enter name of product";
	}
	else {
		header("location : update_product.php");
	}

}
$_SESSION['nameOfProduct'] = $nameOfProduct;
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