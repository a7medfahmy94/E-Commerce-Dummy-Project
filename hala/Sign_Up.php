<!DOCTYPE html>
<html>
<body>

<?php
// define variables 
if (@$_POST["submit"] <> "") {

	$servername = "localhost";
    $username = "root";
    $password = " ";
    $dbname = "e-commerce";

    $name = $_POST["Name"];
    $address = $_POST["Billing address"];
    $Phone = $_POST["Phone"];
    $Email = $_POST["Email"];
    $password = $_POST["Password"];
    $Shipping = $post["Shipping address"]:

  
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO customer (fname, billing_address,shipping_address,phone,email, password)
    VALUES ('$name', '$address','$Shipping','$Phone' ,'$Email','$password')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " ;
    }

    mysqli_close($conn);
}
     
?>
</body>
</html>