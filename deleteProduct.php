<?php

$servername = "localhost";
$username = "root";
$password = "fahmy1234";
$dbname = "E-Commerce";

#connect database
$conn = new mysqli($servername, $username, $password,$dbname);


	#check if set ID of product
	if (isset($_POST["IDOfproduct"])){
		$IDOfproduct = $_POST["IDOfproduct"];

		#delete 2l row
		$sql = "DELETE FROM product where  id = $IDOfproduct" ;

		#check if already delete
		if ($conn->query($sql) == TRUE) {
  		echo "Success deleting";
		}
		else {
  		echo "can't delete product because it's  in order_processing records";
		}
	}else{
		echo "Error2";
	}
	$conn->close();
 ?>