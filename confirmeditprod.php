<?php
session_start();
include("includes/mysqli_connection.php");

if (!isset($_SESSION['username']))
{
	echo "<script>alert('Admin Says : : Login First :-( !!!')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else if(!isset($_SESSION['status']) )
{
	echo "<script>alert('Checking!!!: :')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else
{
	$admin = $_SESSION['username'];
}

?>

<?php

if(isset($_SESSION['username']))
{
	$id = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['id']));
	$Name = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Name']));
	$Path = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Path']));
	$Category = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Category']));
	$Price = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Price']));
	$Descr = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Descr']));
	$Type = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Type']));
}

else
{
	echo "ERROR!!!";
	$id = "";
}
	
	$updateuser = "UPDATE product SET prodname='$Name', path='$Path', category='$Category', price='$Price', descr='$Descr', type='$Type' WHERE id='$id'";
	
	$query = mysqli_query($db_conx,$updateuser);
	
	if($query)
	{
		echo "<script>alert('Successfully Updated!')</script>";
		echo "<script>window.location.href='viewprod.php';</script>";
	}
	
	else
	{
		echo "Could not update data";
		echo "<script>window.location.href='viewprod.php';</script>";
	}
?>