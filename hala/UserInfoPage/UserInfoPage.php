<!DOCTYPE html>
<html>
<body>
<title>UserPageInfo</title>
<body >
<dl>

	<?php
 	$servername = "localhost:3306";
    $dbusername = "hala";
    $dbpassword = "hala";
    $dbname = "e-commerce";

// Create connection
	$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT fname, billing_address, phone, password FROM customer where id=1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
	    while($row = $result->fetch_assoc()) {
	    	$Name=$row["fname"];
	    	$Address=$row["billing_address"];
	    	$Phone=$row["phone"];
	    	$Password=$row["password"];
	    	
	    }
	   
	  
	    
	} else {
	    echo "0 results";
	}
	$conn->close();
?>
<form name="myForm" action = "edit.php" onsubmit="return validateForm()" method="post">
	<br>
	Name: <input type="text" name="Name" value="<?php echo $Name ?>">
	<br>
	<br>
	Address: <input type="text" name="BillingAddress" value="<?php echo $Address ?>"> 
	<br>
	<br>
	Phone: <input type="text" name="Phone" value="<?php echo $Phone ?>"> 
	<br>
	<br>
	Password: <input type="text" name="Password" value="<?php echo $Password ?>"> 
	<br>
	<input type="submit" value="Edit" name="submit" >
	</form>

</body>
<script>
 function validateForm() {
    // validate name
    var x = document.forms["myForm"]["Name"].value;
    if (x==null || x=="") {
        alert("Name must be filled out");
        return false;
    }
    
    // validate Billing address
    var y = document.forms["myForm"]["BillingAddress"].value;
    if (y==null || y=="") {
        alert("Billing address must be filled out");
        return false;
    }
    
    // validate phone
    var z = document.forms["myForm"]["Phone"].value;
    if (z==null || z=="") {
        alert("Phone must be filled out");
        return false;
    }
    //sure that phone=11 number
    var phoneno = /^\d{10}$/;
    if(!z.match(phoneno))  {
         alert("Not a valid Phone Number");
         return false;
    }
    
    
     // validate password
    var s = document.forms["myForm"]["Password"].value;
    if (s==null || s=="") {
        alert("Password must be filled out");
        return false;
    }
    
    return true;
}
</script>
</html>