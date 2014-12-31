<?php
	$conn = new mysqli("localhost","root","fahmy1234","E-Commerce");
	if($conn->connect_error){//if error , redirect to index
	    header("location: http://localhost/index.php");
	}
	$ids = json_decode($_POST['ids'],true);//transforms the JSON to array
	$len = count($ids);
	$str = "";
	for($i = 0; $i < $len; $i++){
		$str = $str. (string)$ids[$i]." or ";
		$result = $conn->query("SELECT * FROM order_processing WHERE transaction_id=".$ids[$i]);
		$order = $result->fetch_object();
		$conn->query("UPDATE product SET p_quantity=p_quantity-".$order->quantity." WHERE id=".
			$order->product_id);
	}
	$str .= "TRUE";
	$conn->query("UPDATE order_processing SET processed = TRUE WHERE transaction_id= ".
		$str);

 	$conn->close()
?>