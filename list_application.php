<?php
session_start();
?>
<html>
	<header>
		<title> List </title>
		<link rel="stylesheet" href="css/bootstrap.css">
 	</header>

 	<body style="margin-left:15px">
 	<h1> Home Page </h1>
   <button onclick="logOut();">Log out</button><br><br><br>
		<a class="btn" href="products_list_page.html">Product List</a><br><br><br>
 		<a class="btn" href="orderTrack.php">Order tracking</a><br><br><br>
 		<a class="btn" href="UserInfoPage.php">Info</a><br><br><br>
 		<a class="btn" href="cart.php">Shopping Cart</a><br><br><br>
 		<a class="btn" href="checkout.php">Check Out</a><br><br><br>
	<script>
		function logOut(){
			window.location.href = "logOut.php";
		}
		</script>
 	</body>

</html>