<?php
	$conn = new mysqli("localhost","root","fahmy1234","E-Commerce");
	if($conn->connect_error){//if error , redirect to index
	    header("location: http://localhost/index.php");
	}
	$q = $_POST['quantity'];
	$id = $_POST['transaction_id'];
	$conn->query("UPDATE order_processing SET quantity=".$q." WHERE transaction_id=".$id);
 	$conn->close()

 ?>