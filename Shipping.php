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

$sql = "SHOW TABLES FROM order_processing WHERE shipped = 0";
$result = mysqli_query($conn , $sql);

if (!$result) {
   die('Could not get data: ' . mysql_error());
}

while ($row = mysql_fetch_row($result)) {
    echo "Table: {$row[0]}\n";
}

mysql_free_result($result);

if (isset($_POST["OK"])){
	if (empty($_POST["name"])){
		echo "Enter name of product";
	}
	else{
		$name = $_POST["name"];
		$sql = "UPDATE order_processing SET shipped = 1 WHERE name = $name";

		if ($conn->query($sql) === TRUE) {
  	  echo "Record updated successfully";
		}
	  else {
    	echo "Error updating record: " . $conn->error;
		}
	}
	$num = $_POST["num"] ;
	$com = $_POST["company"];
	$sql = "INSERT INTO order_processing (tracking_number,shipping_company)
	VALUES ($num , $com)";

	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	}
	else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

}

?>

<html>
	<header>
		<title> Shipping </title>
		<b> Shipping Page </b> 
 	</header>

 	<body>

 		<form action = "home_page.php" method = "post">
 			Enter name of product <br>
 			<input name = "name" type = "text">
 			<br>
 			Enter number <br>
 			<input name = "num" type = "text">
 			<br>
 			Enter name of company <br>
 			<input name = "company" type = "text"> 			
 			<br>
 			<br>
 			<input type = "submit" name = "OK" value = "OK" >  
 		</form>

 	</body>

</html>