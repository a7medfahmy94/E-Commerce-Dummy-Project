<?php
    $servername = "localhost:3306";
    $dbusername = "hala";
    $dbpassword = "hala";
    $dbname = "e-commerce";
$con=mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM customer");

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Email</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    $name=$row['fname'];
echo "<tr>";
echo "<td>" . $row['fname'] . "</td>";
echo "<td>" . $row['email'] . "</td>";

 echo "<td><form action='editpage.php'  method= 'post'><input type='text' style='display: none' name='id' value='". $row['id'] ."'>".
 "<input type='submit' value='Edit' /></form></td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>