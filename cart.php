<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "fahmy1234";
	$dbname = "E-Commerce";

	// Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
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
						while($row = $result->fetch_object()){
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
												<a id="'.$row->transaction_id.'_plus" class="btn" href=""> + </a>
												<input id="'.$row->transaction_id.'_quantity" class="cart_quantity_input" type="text" name="quantity" data-max="'.$row->p_quantity.'" value="'.$row->quantity.'" autocomplete="off" size="2">
												<a id="'.$row->transaction_id.'_minus" class="btn" href=""> - </a>
											</div>
										</td>
										<td class="cart_total">
											<p id="'.$row->transaction_id.'" class="cart_total_price">$'.($row->quantity * $row->price).'</p>
										</td>
										<td class="cart_delete">
											<a class="btn" id="'.$row->transaction_id.'_delete" href=""><span>X</span></i></a>
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
	echo '<a class="btn btn-lg" href="checkOut.php">Purchase</a>';
	?>
	</div>



	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.js"></script>
      <script>
		    $(function(){
		    	function updateTotal(id){
		    		var q  = parseInt($("#"+id+"_quantity").val());
		    		var p  = parseInt($("#"+id+"_price").text());
		    		$("#"+id).html('$' + (q*p));
		    		$.ajax({
		    			url: "updateOrders.php",
		    			type: "POST",
		    			data: {
		    				transaction_id: id,
		    				quantity: q
		    			}
		    		});
		    	}
		    	function destroyOrder(id){
		    		$.ajax({
							url: "destroyOrder.php",
		    			type: "POST",
		    			data: {
		    				transaction_id: id
		    			}
		    		});
		    	}
		    	//a plus,minus
		    	//input quantity
		    	//p total
		    	$("a[id*='plus']").bind('click',function(){
		    		var v = parseInt($(this).next().val());
		    		var max = parseInt($(this).next().attr('data-max'));
		    		if(v+1 <= max){
			    		$(this).next().val(v+1);
			    		var id = $(this).attr('id').split('_')[0];
			    		updateTotal(id);
			    	}
		    		return false;
		    	});
		    	$("a[id*='minus']").bind('click',function(){
		    		var v = parseInt($(this).prev().val());
		    		if(v > 0){
			    		$(this).prev().val(v-1);
			    		var id = $(this).attr('id').split('_')[0];
			    		updateTotal(id);
		    		}

		    		return false;
		    	});
		    	$("a[id*='_delete']").bind('click',function(){
		    		var id = $(this).attr('id').split('_')[0];
		    		destroyOrder(id);
		    		$("#"+id+"_row").remove();
		    		return false;
		    	});
		    });

  </script>
</body>
</html>


<?php $result->close();$conn->close(); ?>