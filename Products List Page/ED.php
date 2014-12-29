<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link type="text/css" rel="stylesheet" href="Products.css" />
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-commerce";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM product WHERE Category = 'Electrical Device'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
		 $_SESSION['id'] = $row["id"];
?>
		 <ul><div id="products"><div class="e2"> <img src="<?php echo $row["Picture"];?>
           " />
          <h3><?php echo " id: " . $row["id"].
		   "<br />   name: " . $row["name"].
		   "<br /> category: " . $row["category"]."<br />   subcategory: " . 
		   $row["subcategory"]
		   ?> 
           <form method="post" action="purshace.php">
            <select name="quant" >
            <?php
			 $x =$row["quantity"];
			
 				while($x){
					?>
                     <option><?php echo $x;$x--;?></option>
                    
                    <?php
				}?>
 				</select>
                <input type="submit" name="submit" value="Purchase">
                </form> </h3>
          </div></div></ul>
         <?php
    }
} else {
    echo "0 results";
}
$conn->close();
?>


