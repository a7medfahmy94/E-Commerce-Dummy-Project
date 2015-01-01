<?php
session_start();

$_SESSION['current_user'] = null;
header("location: index.php");

 ?>