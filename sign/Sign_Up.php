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
    $Email = $_POST["Email"];
    $password = $_POST["Password"];
    $Shipping = $_POST["ShippingAddress"];
    

    // Check connection
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "insert into customer (fname, billing_address,shipping_address,phone,email, password)".
    "VALUES ('$name', '$address','$Shipping','$Phone' ,'$Email','$password')";
    
      if (mysqli_query($conn, $sql)) {
        header( 'Location: home_page.php');
          exit;
    } else {
        echo "Error: " ;
    }

    mysqli_close($conn);

}

?>