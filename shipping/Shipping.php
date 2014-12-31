<?php
session_start();
$servername = "localhost";
$username = "LeilaSaeed";
$password = "leila";
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
	if (empty($_POST["name"])){
		echo "Enter name of product";
	}
	else{
		$name = $_POST["name"];
		$sql = "UPDATE order_processing SET shipped = 1 WHERE name = $name";

		#check if row already updating
		if ($conn->query($sql) === TRUE) {
  	  echo "success updating";
		}
	  else {
    	echo "Error updating record: " . $conn->error;
		}
	}
	$num = $_POST["num"] ;
	$com = $_POST["company"];

	$sql = "INSERT INTO order_processing (tracking_number,shipping_company)
	VALUES ($num , $com)";

	#check if already insert 
	if ($conn->query($sql) === TRUE) {
    echo "successfully";
	}
	else {
    echo "Error" . $sql . "<br>" . $conn->error;
	}

}

?>

<html>
	<header>
		<title> Shipping </title>
		<b> Shipping Page </b> 
 	</header>

 	<body>

 		<form action = "home_page.php" method = "post">
 			Enter name of product <br>
 			<input name = "name" type = "text">
 			<br>
 			Enter number <br>
 			<input name = "num" type = "text">
 			<br>
 			Enter name of company <br>
 			<input name = "company" type = "text"> 			
 			<br>
 			<br>
 			<input type = "submit" name = "OK" value = "OK" >  
 		</form>

 	</body>

</html>