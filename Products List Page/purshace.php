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
$password = "";
$dbname = "e-commerce";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['submit'])){
$quant = $_POST['quant'];  // Storing Selected Value In Variable
//echo "You have selected :" .$quant;  // Displaying Selected Value
////////////////////////
$currentUser = $_SEESION["current user"]; //maybe chaned as name as in login
$productID = $_SESSION['id'];
//echo  $quant.$productID;
$sql = "INSERT INTO `order_processing`(`customer_id`,`quantity`,`product_id`) 
VALUES ('$currentUser','$quant','$productID')";// change will be here*/
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>