<?php
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "fahmy1234";
    $dbname = "E-Commerce";

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


    $sql = "UPDATE Customer set fname='$FName' ,lname='$LName',billing_address='$BAddress',
    billing_city='$BCity',billing_state='$BState',billing_zip='$BZip',
    shipping_address='$SAddress',shipping_city='$SCity',shipping_state='$SState',shipping_zip='$SZip'
    ,phone='$Phone' ,
    password='$Password' WHERE id=$id_ ";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header( 'Location: homePageAdmin.php');
        exit();
    } else {
        mysqli_close($conn);
        header( 'Location: editpage.php');
        exit();
    }



?>
    <body style="background-color:LightGray ">
</body>