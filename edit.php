<?php

session_start();
    $id = $_SESSION["current_user"];
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "fahmy1234";
    $dbname = "E-Commerce";

    $fname = $_POST["FName"];
    $lname = $_POST["LName"];
    $address = $_POST["BillingAddress"];
    $address2 = $_POST["ShippingAddress"];
    $Phone = $_POST["Phone"];
    $password = $_POST["Password"];

    // Create connection
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE Customer set fname='$fname' ,lname='$lname',phone='$Phone' ,billing_address='$address',shipping_address='$address2',
    password='$password' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
         mysqli_close($conn);
         header( 'Location: home_page.php');
         exit();

    } else {
         mysqli_close($conn);
        header( 'Location: UserInfoPage.php');
        exit();
    }


?>