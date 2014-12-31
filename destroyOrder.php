<?php
	$conn = new mysqli("localhost","root","fahmy1234","E-Commerce");
	if($conn->connect_error){//if error , redirect to index
	    header("location: http://localhost/index.php");
	}
	$id = $_POST['transaction_id'];
	$conn->query("DELETE FROM order_processing WHERE transaction_id=".$id);
 	$conn->close()

 ?>