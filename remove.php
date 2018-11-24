<?php
session_start();

if (isset($_SESSION['user_id']))
{
	$userid = $_SESSION['user_id'];
}

if (isset($_SESSION['username']))
{
	$User = $_SESSION['username'];
}

else
{
	$User = "";
}
?>

<?php

$productid = $_POST['productid'];

include("includes/mysqli_connection.php");

$sql = "DELETE FROM cart WHERE cust_id = $userid AND product_id = $productid";

mysqli_query($db_conx, $sql);

mysqli_close($db_conx);

echo "<script>alert('Item Successfully Removed');</script>";
echo "<script>window.location.href = 'cart.php';</script>";
?>
 