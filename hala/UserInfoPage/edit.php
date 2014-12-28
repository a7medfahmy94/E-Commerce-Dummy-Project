<?php
//define variables
if (isset($_POST["submit"])) {
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
    }else{
        echo("");
    }
    $sql = " UPDATE customer
    SET fname='$name', biling_address='$address', phone='$Phone' , password='$password'
    WHERE id=1 ";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record updated successfully";
    } else {
        echo "Error: " ;
    }
    mysqli_close($conn);
}


?>