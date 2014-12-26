<?php
// define variables
if (isset($_POST["submit"])) {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "E-Commerce";

    $name = $_POST["Name"];
    $address = $_POST["BillingAddress"];
    $Phone = $_POST["Phone"];
    $Email = $_POST["Email"];
    $password = $_POST["Password"];
    $Shipping = $_POST["ShippingAddress"];

    // Create connection
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        echo("Yay!");
    }

    $sql = "insert into Customer (fname, billing_address,shipping_address,phone,email, password)".
    "VALUES ('$name', '$address','$Shipping','$Phone' ,'$Email','$password')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " ;
    }

    mysqli_close($conn);
}
?>