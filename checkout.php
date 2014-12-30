<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "fahmy1234";
	$dbname = "E-Commerce";

	// Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);

	// Check connection
	if ($conn->connect_error) {//if error , redirect to index
	    header("location: http://localhost/index.php");
	}
	$_SESSION['current_user'] = 2;
	$sql = "SELECT product.p_quantity,transaction_id,product.name,product.price,order_processing.quantity,product_id,date_time,picture FROM order_processing,product WHERE order_processing.customer_id = ".$_SESSION['current_user']." and product.id=order_processing.product_id";
	$result = $conn->query($sql);
?>

<html>
<head>
    <title>HARL | E-Commerce</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
	<h1>HARL | E-Commerce</h1>
	<h2>Shopping Cart</h2>

				<table class="table table-condensed table-bordered table-striped">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					if($result->num_rows > 0){
		//creating the array which will contain all the IDs of all the orders for later use
						echo "<script>var ids = [];</script>";
						while($row = $result->fetch_object()){
		//add the transaction add to the array
							echo "<script>ids.push(".$row->transaction_id.");</script>";
		//the table
							echo '<tr id="'.$row->transaction_id.'_row">
										<td class="cart_product">
											<a href=""><img src="data:image/jpeg;base64,'.base64_encode($row->picture).'"/></a>
										</td>
										<td class="cart_description">
											<h4><a href="">'. $row->name .'</a></h4>
											<p>Product ID: '.$row->product_id.'</p>
										</td>
										<td class="cart_price">
											<p id="'.$row->transaction_id.'_price">'.$row->price.'</p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">
												<input id="'.$row->transaction_id.'_quantity" class="cart_quantity_input" type="text" name="quantity" data-max="'.$row->p_quantity.'" value="'.$row->quantity.'" autocomplete="off" size="2" disabled>
											</div>
										</td>
										<td class="cart_total">
											<p id="'.$row->transaction_id.'" class="cart_total_price">$'.($row->quantity * $row->price).'</p>
										</td>
									</tr>';
						}
					}else{
						echo '<tr>
										<td></td>
										<td></td>
										<td></td>
										<td>
										Go Shopping!!
										</td>
									</tr>';
					}

				 ?>
					</tbody>
				</table>

	<div>
	<?php if($result->num_rows > 0)
	echo '<a id="order" class="btn btn-lg" href="index.php">Order!</a>';
	?>
	</div>



	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.js"></script>
  <script>
	  function order(array){
	  	$.ajax({
	  		type: "post",
	  		url: "finishOrders.php",
	  		data: {ids: JSON.stringify(array)}
	  	});
	  }
  	$("#order").bind('click',function(){
  		order(ids);
  		alert("Thanks for purchasing!!\nWe will deliver the product ASAP");
  	});
  </script>
</body>
</html>


<?php $result->close();$conn->close(); ?>