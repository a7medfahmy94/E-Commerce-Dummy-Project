<?php

$servername = "localhost:3306";
    $dbusername = "hala";
    $dbpassword = "hala";
    $dbname = "e-commerce";


    
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT fname, billing_address,  shipping_address,phone, password FROM customer where id=1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
         $Name=$row["fname"];
         $Address=$row["billing_address"];
         $Address2=$row["shipping_address"];
         $Phone=$row["phone"];
         $Password=$row["password"];
            
        }
       
      
        
    } else {
        echo "0 results";
    }
    $conn->close();

?>
<center>
    <body style="background-color:LightGray ">
 <form name="myForm" action = "edit.php" onsubmit="return validateForm()" method="post">
	<br>
 	FirstName: <input type="text" name="FName" value="<?php echo $Name ?>">
    <br>
    <br>
    LastName: <input type="text" name="LName" value="<?php echo $Name ?>">
    <br>
    <br>
    BillingAddress: <input type="text" name="BillingAddress" value="<?php echo $Address ?>"> 
    <br>
    <br>
    ShippingAddress: <input type="text" name="ShippingAddress" value="<?php echo $Address2 ?>"> 
    <br>
    <br>
    Phone: <input type="text" name="Phone" value="<?php echo $Phone ?>"> 
    <br>
    <br>
    Password: <input type="text" name="Password" value="<?php echo $Password ?>"> 
    <br>
    <input type="submit" value="Edit" name="submit" >
    </form>
</center>
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