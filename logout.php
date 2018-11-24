<?php
	session_start(); 
 
	session_unset(); 
 
	session_destroy(); 
 
	if(!isset($_SESSION['username']))
	{
		echo "<script>alert('Successfully logged out!')</script>";
   		echo "<script>window.location.href='../index-1.php'</script>";
	}
	
	else
	{
		echo "<script>alert('Error Occured!')</script>";
	}
?>