<?php
$host="localhost"; 
$username="root";  
$password=""; 
$db_name="stationary_shop"; 
$conn = mysql_connect($host, $username, $password);
mysql_select_db($db_name, $conn) or die("could not" . mysql_error());
?>