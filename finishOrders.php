<?php
	$conn = new mysqli("localhost","root","fahmy1234","E-Commerce");
	if($conn->connect_error){//if error , redirect to index
	    header("location: http://localhost/index.php");
	}
	$ids = json_decode($_POST['ids'],true);
	$len = count($ids);
	$str = "";
	for($i = 0; $i < $len; $i++){
		$str = $str. (string)$ids[$i]." or ";
	}
	$str .= "TRUE";
	$conn->query("UPDATE order_processing SET processed = TRUE WHERE transaction_id= ".
		$str);
 	$conn->close()
?>