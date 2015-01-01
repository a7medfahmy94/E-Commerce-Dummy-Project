<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link type="text/css" rel="stylesheet" href="Products.css" />
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-commerce";
$shipped =1;
$processed =1;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$trans = intval($_POST['trans']);
$sql = "SELECT * FROM `order_processing` WHERE `transaction_id` = '$trans'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	//	$date = date_create($row["Date / Time"]);
		?>
        
		 <ul><div id="products"><h3><?php
			   echo "Transaction ID: " . $row["transaction_id"].
		   "<br />Customer ID: " . $row["customer_id"].
		   "<br />product ID: " . $row["product_id"]."<br />Date / Time: " .
		    $row['date_time']
		   ."<br />Quantity: " . $row["quantity"];
		 
		    $ship = $row["shipped"];
			if($row["processed"] ==$processed){
				echo "<br />processed: " ."done processing";
			}
			else if ($row["processed"] ==0){
				echo "<br />processed: " ."not processed Yet";
			}
			else{
				echo "<br />processed: " .$row["processed"];
			}
			
		 	if($ship == $shipped){
			?> <?php echo "<br> shipped: Shipped". "<br> Date shipped: " .$row["date_shipped"]
				."<br> Shipping Company: " .$row["shipping_company"]?>
                </div></ul>
                <?php
			}
			else{
				?> <?php echo "<br> shipped: Not Shipped Yet";?>
                 </div></ul>
                <?php
			}
		 ?></h3><?php
    }
} else {
    echo "not match any transaction ID please write right one and try agian";
}
$conn->close();
?>

