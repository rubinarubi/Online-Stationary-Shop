<?php
session_start();

if (!isset($_SESSION['username']))
{
	echo "<script>alert('Admin Says : : Login First :-( !!!')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
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

<!DOCTYPE html>
<html>
<head>
<title>Administration Area</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>
<body>

<p align="center"><b>Administration Area</b></p>

<?php echo 'Hi, <strong>' . $admin . '</strong> Good To See You Working! || <a href="logout.php"> Logout </a>'; ?>

<br />
<div align="center">
	<?php include("adminmenu.php");?>
</div>
</body>
</html>