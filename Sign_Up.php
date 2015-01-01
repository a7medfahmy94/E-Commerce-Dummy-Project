<?php
//define variables
if (isset($_POST["submit"])) {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "fahmy1234";
    $dbname = "E-Commerce";


    $name = $_POST["Name"];
    $address = $_POST["BillingAddress"];
    $Phone = $_POST["Phone"];
    $Email = $_POST["Email"];
    $password = $_POST["Password"];
    $Shipping = $_POST["ShippingAddress"];


    // Check connection
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "insert into Customer (fname, billing_address,shipping_address,phone,email, password)".
    "VALUES ('$name', '$address','$Shipping','$Phone' ,'$Email','$password')";

      if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header( 'Location: home_page.php');
          exit;
    } else {
        mysqli_close($conn);
        echo "Error: " ;
    }



}

?>
