<?php
session_start(); 

if( isset($_POST["start shopping"]) ){
	header("location: productList.php");
}
else if( isset($_POST["track orders"]) ){
	header("location: pageOfCustomer.php");
	
} 
else if (isset($_POST["Your account"])){
	header("location: UserInfoPage.php");
}
else if( isset($_POST["change your information"]) ){
	header("location: CustomerAccountsPage.php");	
}
else if( isset($_POST["cart"]) ){
	header("location: cart.php");	
}
else if( isset($_POST["checkout"]) ){
	header("location: checkout.php");	
}


?>
<html>
	<header>
		<title> List </title>
		<b> List </b> 
 	</header>

 	<body>
 		#product list
 		<form action = "list_application.php" method = "post">
 			<br>
 			<input type = "submit" name = "start shopping" value = "start shopping" >
 			<br>  
 		</form>
 			OR 
 		#track order 
 		<form action = "list_application.php" method = "post">
 			<br>
 			<input type = "submit" name = "track orders" value = "track orders"> 
 			<br> 
 		</form>
 			OR
 		# customer account
 		<form action = "list_application.php" method = "post"> 		 
 			<br>
 			<input type = "submit" name = "Your account" value = "Your account"> 
 		</form>
 			OR
 		#update user page
 		<form action = "list_application.php" method = "post"> 		 
 			<br>
 			<input type = "submit" name = "change your information" value = "change your information"> 
 		</form>
 			OR
 		# cart page
 		<form action = "list_application.php" method = "post"> 		 
 			<br>
 			<input type = "submit" name = "cart" value = "cart"> 
 		</form>
 			OR
 		#checkout page
 		<form action = "list_application.php" method = "post"> 		 
 			<br>
 			<input type = "submit" name = "checkout" value = "checkout"> 
 		</form>
 	</body>

</html>