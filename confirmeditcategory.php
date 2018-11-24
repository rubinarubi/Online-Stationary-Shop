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
	$menuid = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Menuid']));
	$Name = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Name']));
	$Link = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Link']));
}

else
{
	echo "ERROR!!!";
	$menuid = "";
}
	
	$updateuser = "UPDATE main_menu SET mmenu_name='$Name', mmenu_link='$Link' WHERE mmenu_id='$menuid'";
	
	$query = mysqli_query($db_conx,$updateuser);
	
	if($query)
	{
		echo "<script>alert('Successfully Updated!')</script>";
		echo "<script>window.location.href='viewcategories.php';</script>";
	}
	
	else
	{
		echo "Could not update data";
		echo "<script>window.location.href='viewcategories.php';</script>";
	}
?>