
<?php
	 if (isset($_POST['LogIn'])) { 
        $data1 = $_POST['Email'];
         $data2 = $_POST['password']; 
        
    } 

	$servername = "localhost:3306";
    $dbusername = "hala";
    $dbpassword = "hala";
    $dbname = "e-commerce";


    
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($con,"SELECT * FROM order_processing WHERE email='$data1' ");
    if ($result->num_rows > 0) {
         $Password=$row["password"];
            
        }
    } else {

        echo "email error";
    }
    $conn->close();

?>

<html>

<body style="background-color:LightGray ">

                        
<center>
	<h2>Login to your account</h2>
        <form  name="myForm"   method="post">
            <input type="email" name="Email" placeholder="Email Address" />
            <br>
            <br>
            <input type="text" name="Password" placeholder="Password" />    
            <br>
            <br>
            <button type="submit" name="LogIn" class="btn btn-default">Login</button>
        
       
</form>
    </form>
</center>    </body>
        </html>