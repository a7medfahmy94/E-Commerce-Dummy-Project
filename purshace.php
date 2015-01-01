<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
 <?php
$servername = "localhost";
$username = "root";
$password = "fahmy1234";
$dbname = "E-Commerce";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['submit'])){
$quant = $_POST['quant'];  // Storing Selected Value In Variable
//echo "You have selected :" .$quant;  // Displaying Selected Value
////////////////////////
$currentUser = $_SESSION["current_user"]; //maybe chaned as name as in login
$productID = $_POST['p_id'];
//INSERT missing current time
$sql = "INSERT INTO `order_processing`(`customer_id`,`quantity`,`product_id`,`shipped`,`processed`)
VALUES ($currentUser,$quant,$productID,0,0)";// change will be here*/
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo '<br>';
}

$conn->close();
}
?>


<html>

	<a href="list_application.php">Home</a>


</html>