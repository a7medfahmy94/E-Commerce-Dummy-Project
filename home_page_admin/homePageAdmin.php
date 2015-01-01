<html>
	<header>
		<title> List </title>
		<b> Home Page </b> 
 	</header>

 	<body>
 		<button onclick="Store_Product()"> Store Product </button>
		<button onclick="Customer_Account()"> Customer Account </button>
		<button onclick="Shipping_Products()"> Shipping Products </button>
		<button onclick="Edit_product()"> Edit product </button>
 		
 		<script>
		function Store_Product() {
			<?php $f = 0; ?>
    	window.location.href = 'login_Admin.php';
		}
		function Customer_Account() {
			<?php $f = 1; ?>
    	window.location.href = 'login_Admin.php';
		}
		function Shipping_Products() {
			<?php $f = 2; ?>
    	window.location.href = 'login_Admin.php';
		}
		function Edit_product() {
			<?php $f = 3; ?>
    	window.location.href = 'login_Admin.php';
		}
		</script>
 		
 	</body>

</html>