<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "fahmy1234";
$dbname = "E-Commerce";

$conn = new mysqli($servername, $username, $password,$dbname);

#check connect
if( $conn->connect_error ){
  $conn->close();
  echo "Could not connect ";
  header("location : homePageAdmin.php");
}
$sql = "SELECT transaction_id , customer_id , product_id , quantity FROM order_processing WHERE shipped = 0 AND processed = 1 ";

#check if get this coloum
$result = $conn->query($sql);

if( $result->num_rows <= 0 ){
	echo"Could not get data";
  $conn->close();
	header("location : homePageAdmin.php");
}
?>
<?php #show data of order_process table ?>
<html>
<body>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
</head>
  <h2>Order</h2>
        <table class="table table-condensed table-bordered table-striped">
          <thead>
            <tr class="orderOfProduct">
              <td class="transaction_id">ID</td>
              <td class="customer_id">Customer_ID</td>
              <td class="product_id">Product_ID</td>
              <td class="quantity">Quantity</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
          <?php
          if($result->num_rows > 0){
            while($row = $result->fetch_object()){
            	echo '<tr>
							<td>'.$row->transaction_id.'</td>
							<td>'.$row->customer_id.'</td>
							<td>'.$row->product_id.'</td>
							<td>'.$row->quantity.'</td>
							</tr>';
            }
          }
         ?>
          </tbody>
        </table>

</body>
</html>
<?php

if (isset($_POST["OK"])){

	#check if set name
	if (!isset($_POST["id"])){
		echo "Enter id of transaction";
	}
	else{
		$id = $_POST["id"];
		$num = $_POST["num"] ;
		$com = $_POST["company"];
		$sql = "UPDATE order_processing SET shipped = 1 ".
		" , tracking_number = $num , shipping_company = '$com' ".
		" WHERE transaction_id = $id";
		echo "$sql";
		#check if row already updating
		if ($conn->query($sql) === TRUE) {
  	  echo "success updating";
		}
	  else {
    	echo "Error updating record: " . $conn->error;
		}
	}


}

?>

<html>
	<header>
		<title> Shipping </title>
		<b> Shipping Page </b>
 	</header>
	<style>
	.lginput{
		width: 190px;

	}
	</style>
 	<body>

 		<form class="form-group" action = "Shipping.php" method = "post">
 			Enter id of transaction <br>
 			<input style="height: 40px;" class="lginput form-control" name = "id" type = "number">
 			<br><br>
 			Enter number <br>
 			<input style="height: 40px;"class="lginput form-control" name = "num" type = "text">
 			<br><br>
 			Enter name of company <br>
 			<input style="height: 40px;"class="lginput form-control" name = "company" type = "text">
 			<br>
 			<br>
 			<input style="height: 40px;"class="form-control" type = "submit" name = "OK" value = "OK" >
 		</form>

 	</body>

</html>