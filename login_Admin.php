<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "fahmy1234";
$dbname = "E-Commerce";

$conn = new mysqli($servername, $username, $password,$dbname);

if($conn->connect_error){
	echo "connection error";
	header("Location: homePageAdmin.php");
	exit();
}

#check if set username
if(strlen($_POST["username"]) == 0){
	header("Location: logInAdmin.html");
	exit();
}

#check if set pass
if(strlen($_POST["password"]) == 0){
	header("Location: logInAdmin.html");
	exit();
}

$u = $_POST['username'];
$p = $_POST['password'];
$sql = "SELECT * FROM admin WHERE username='$u' and password='$p'";


#check if get admin
$result = $conn->query($sql);


#check if get data
if( $result->num_rows == 0 ){
  header("location: logInAdmin.html");
  exit();
}else{
	$row = $result->fetch_object();
	$_SESSION['current_user'] = $row->id;
	header("Location: homePageAdmin.php");
	exit();
}


?>


