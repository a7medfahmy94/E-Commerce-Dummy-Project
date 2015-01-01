<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	
	//conect to server
	$connect = mysql_connect("localhost","root","");
	//connect to DataBase
	mysql_select_db("e-commerce");
	//query the database
	$query = mysql_query("SELECT * FROM product WHERE product ID =1")
	//fetch results
	WHILE ($row = mysqli_fetch_array($query)):
		# code...
		$pID= $row['product ID'];
		$itemName =$row['Item Name'];
		echo "$pID <br> $itemName <br>";
	.endwhile 
	?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

</body>
</html>