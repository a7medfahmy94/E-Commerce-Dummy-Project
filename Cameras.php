<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link type="text/css" rel="stylesheet" href="Products.css" />
<?php
$servername = "localhost";
$username = "root";
$password = "fahmy1234";
$dbname = "E-Commerce";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$currentUser = $_SEESION["current user"];
$sql = "SELECT * FROM product WHERE Category = 'Camera'";
$record =
$result = $conn->query($sql);
//if($_SEESION["current user"] == /*somwthing*/  ){
if ($result->num_rows > 0) {
    // output data of each row
?>	<ul><div id="products">
<?php
    while($row = $result->fetch_assoc()) {
		 $_SESSION['current user'] = $row["id"];
?>
			<div class="e2">
			<?php echo '<img src="data:image/png;base64,' . base64_encode($row['picture']) . '" />';
			?>
          <h3><?php echo " id: " . $row["id"].
		   "<br />   name: " . $row["name"].
		   "<br /> category: " . $row["category"]."<br />   subcategory: " .
		   $row["subcategory"]
		   ?>
           <form method="post" action="purshace.php">
            <select name="quant" >
            <?php
			 $x =$row["p_quantity"];

 				while($x){
					?>
                     <option><?php echo $x;$x--;?></option>

                    <?php
				}?>
 				</select>

        <input type="text" name="p_id" value="<?php echo $row['id'] ?>" style="display:none;" />
                <input type="submit" name="submit" value="Purchase">
                </form> </h3>
              </div>
          <?php

    }?>
    </div></ul> <?php
} else {
    echo "Not founs Items matches";
}
//}
$conn->close();
?>