<!-- <!DOCTYPE html>
<html>
<body>
<title>UserPageInfo</title>
<body >
<dl> -->

	<?php
 	$servername = "localhost:3306";
    $dbusername = "hala";
    $dbpassword = "hala";
    $dbname = "e-commerce";

    $id_=$_POST["id"];

// Create connection
	$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM customer where id=$id_";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
	    while($row = $result->fetch_assoc()) {
	    	$FName=$row["fname"];
	    	$LName=$row["lname"];
	    	$BAddress=$row["billing_address"];
	    	$BCity=$row["billing_city"];
	    	$BState=$row["billing_state"];
	    	$BZip=$row["billing_zip"];
	    	$SAddress=$row["shipping_address"];
	    	$SCity=$row["shipping_city"];
	    	$SState=$row["shipping_state"];
	    	$SZip=$row["shipping_zip"];
	    	$Phone=$row["phone"];
	    	$Email=$row["email"];
	    	$Password=$row["password"];
	    	
	    }
	   
	  
	    
	} else {
	    echo "0 results";
	}
	
	$conn->close();
?>
<form name="myForm" action = "UpdateCustomerInfo.php" onsubmit="return validateForm()" method="post">
	<br>
	ID: <input type="text" name="ID" value="<?php echo $id_ ?>">
	<br>
	FIRSTName: <input type="text" name="FName" value="<?php echo $FName ?>">
	<br>
	LastName: <input type="text" name="LName" value="<?php echo $LName ?>">
	<br>
	BillingAddress: <input type="text" name="BillingAddress" value="<?php echo $BAddress ?>"> 
	<br>
	BillingCity: <input type="text" name="BillingCity" value="<?php echo $BCity ?>">
	<br>
	BillingState: <input type="text" name="BillingState" value="<?php echo $BState ?>">
	<br>
	BillingZip: <input type="text" name="BillingZip" value="<?php echo $BZip ?>">
	<br>
	ShippingAddress: <input type="text" name="ShippingAddress" value="<?php echo $SAddress?>">
	<br>
	ShippingCity: <input type="text" name="ShippingCity" value="<?php echo $SCity?>">
	<br>
	ShippingState: <input type="text" name="ShippingState" value="<?php echo $SState?>">
	<br>
	ShippingZip: <input type="text" name="ShippingZip" value="<?php echo $SZip?>">
	<br>
	Phone: <input type="text" name="Phone" value="<?php echo $Phone ?>"> 
	<br>
	Email: <input type="text" name="Email" value="<?php echo $Email ?>"> 
	<br>
	Password: <input type="text" name="Password" value="<?php echo $Password ?>"> 
	<br>
	<input type="submit" value="Edit" name="submit" >
	</form>

</body>
 <script>
 function validateForm() {
    // validate name
    var x = document.forms["myForm"]["FName"].value;
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

    var w = document.forms["myForm"]["ShippingAddress"].value;
    if (w==null || w=="") {
        alert("Shipping address must be filled out");
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

    var r = document.forms["myForm"]["Email"].value;
    if (r!='$Email') {
        alert("can't change email");
        return false;
    }
    
    return true;
}
 </script>
</html>