<?php
session_start();

if(!isset($_SESSION['status']) )
{
	echo "<script>alert('Checking!!!: :')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else
{
	echo "<script>window.location.href='adminhome.php';</script>";
}
?>