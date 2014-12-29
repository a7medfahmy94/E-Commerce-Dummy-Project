<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link type="text/css" rel="stylesheet" href="Products.css" />
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-commerce";
$shipped =1;
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
		?>
		 <ul><div id="products"> <img src="<?php echo $row["Picture"];?>
           " />
          <h3><?php
			   echo "Transaction ID: " . $row["transaction_id"].
		   "<br />Customer ID: " . $row["customer_id"].
		   "<br />product ID: " . $row["product_id"]."<br />Date / Time: " . 
		   $row["Date / Time"]."<br />Quantity: " . $row["quantity"]
		   ."<br />processed: " . $row["processed"]
		   ."<br />shipped: " . $row["shipped"];
		   ?> </h3>
         <?php
		    $ship = $row["shipped"];
		 	if($ship == $shipped){
			?><h3> <?php	echo "Date shipped: " .$row["date_shipped"]
				."<br> Shipping Company: " .$row["shipping_company"]?></h3>
                </div></ul>
                <?php
			}
		 
    }
} else {
    echo "not match any transaction ID please write right one and try agian";
}
$conn->close();
?>

