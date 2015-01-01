<?php session_start(); ?>
<html>
	<header>
		<title> List </title>
		<b> Home Page </b>
 	</header>

 	<body>
 	<?php if(isset($_SESSION['current_user'])){ ?>
 		<button onclick="Store_Product()"> Store Product </button>
		<button onclick="Customer_Account()"> Customer Account </button>
		<button onclick="Shipping_Products()"> Shipping Products </button>
		<button onclick="Edit_product()"> Edit product </button>
		<button onclick="logOut();">Log Out</button>
	<?php }else{ ?>
		<script>window.location.href = "logInAdmin.html";</script>
	<?php } ?>


 		<script>
		function Store_Product() {
				window.location.href = "Store_Page.php";
		}
		function Customer_Account() {
				window.location.href = "CustomerAccountsPage.php";
		}
		function Shipping_Products() {
				window.location.href = "Shipping.php";
		}
		function Edit_product() {
				window.location.href = "EditProduct.php";
		}
		function logOut(){
			window.location.href = "logOut.php";
		}
		</script>

 	</body>

</html>