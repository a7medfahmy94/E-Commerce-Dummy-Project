<?php
	$conn = new mysqli("localhost","root","fahmy1234","E-Commerce");
	if($conn->connect_error){
		die("Error");
	}
	$q = $_POST['quantity'];
	$id = $_POST['transaction_id'];
	$conn->query("UPDATE order_processing SET quantity=".$q." WHERE transaction_id=".$id);
 	$conn->close()

 ?>