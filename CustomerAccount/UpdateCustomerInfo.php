<?php
    $servername = "localhost:3306";
    $dbusername = "hala";
    $dbpassword = "hala";
    $dbname = "e-commerce";

    $id_=$_POST["ID"];
    $FName=$_POST["FName"];
    $LName=$_POST["LName"];
    $BAddress=$_POST["BillingAddress"];
    $BCity=$_POST["BillingCity"];
    $BState=$_POST["BillingState"];
    $BZip=$_POST["BillingZip"];
    $SAddress=$_POST["ShippingAddress"];
    $SCity=$_POST["ShippingCity"];
    $SState=$_POST["ShippingState"];
    $SZip=$_POST["ShippingZip"];
    $Phone=$_POST["Phone"];
    //$Email=$_POST["email"];
    $Password=$_POST["Password"];

    // Create connection
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        echo "ok";
    }

    // $sql = "UPDATE customer set fname='FName' ,lname='$LName', billing_address ='$BAddress',
    // billing_cite='$BCity',billing_state='$BState',billing_zip='$BZip', shipping_address='$SAddress',
    // shipping_city='$SCity',shipping_state='$SState',shipping_zip='$SZip',phone='$Phone' ,
    // password='$Password' WHERE id=1";
    $sql = "UPDATE customer set fname='$FName' ,lname='$LName',billing_address='$BAddress',
    billing_city='$BCity',billing_state='$BState',billing_zip='$BZip',
    shipping_address='$SAddress',shipping_city='$SCity',shipping_state='$SState',shipping_zip='$SZip'
    ,phone='$Phone' ,
    password='$Password' WHERE id=$id_ ";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " ;
    }

    mysqli_close($conn);
?>