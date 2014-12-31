<?php 

if( isset($_POST["start shopping"]) ){
	header('location: productList.php');
}
else if( isset($_POST["track orders"]) ){
	header('location: pageOfCustomer.php');
	
}
else if( isset($_POST["change your information"]) ){
	header('location: pageOfCustomer.php');	
}

?>
<html>
	<header>
		<title> List </title>
		<b> List </b> 
 	</header>

 	<body>
 		<form action = "list_application.php" method = "post">
 			<br>
 			<input type = "submit" name = "start shopping" value = "start shopping" >
 			<br>  
 			OR  
 			<br>
 			<input type = "submit" name = "track orders" value = "track orders"> 
 			<br>  
 			OR  
 			<br>
 			<input type = "submit" name = "change your information" value = "change your information"> 
 		</form>

 	</body>

</html>