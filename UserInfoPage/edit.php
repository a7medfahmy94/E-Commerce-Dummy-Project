<?php
    $servername = "localhost:3306";
    $dbusername = "hala";
    $dbpassword = "hala";
    $dbname = "e-commerce";

    $name = $_POST["Name"];
    $address = $_POST["BillingAddress"];
    $Phone = $_POST["Phone"];
    $password = $_POST["Password"];
  
    // Create connection
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE customer set fname='$name' ,phone='$Phone' ,billing_address='$address',
    password='$password' WHERE id=1 ";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " ;
    }

    mysqli_close($conn);
?>