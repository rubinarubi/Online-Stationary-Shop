<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>VIEW ABOUT PAGE</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>
<body>

<?php

if (!isset($_SESSION['username']))
{
	echo "<script>alert('Admin Says : : Login First :-( !!!')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else if(!isset($_SESSION['status']) )
{
	echo "<script>alert('you are not logged in. Please logged in first.:')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else
{
	$admin = $_SESSION['username'];
}

?>

<p align="center"><b>VIEW CATEGORY RECORDS</b></p>

<?php echo 'Hi, <strong>' . $admin . '</strong> Good To See You Working! || <a href="logout.php"> Logout </a>'; ?>

<br />
<div align="center">
	<?php include("adminmenu.php");?>
</div>

<?php

        include('includes/connect-db.php');
        $result = mysql_query("SELECT * FROM webcontent ORDER BY content_id ASC") 
                or die(mysql_error());  

        echo "<br /><table align='center' border='1' cellpadding='10'>";
		
		echo "<tr> <th>CONTENT ID</th> <th>CONTENT</th> <th>WEBPAGE</th> <th></th> <th></th></tr>";
		
        while($row = mysql_fetch_array($result)) {	
			echo "<tr>";
			echo '<td>' . $row['content_id'] . '</td>';
			echo '<td>' . $row['content'] . '</td>';
			echo '<td>' . $row['webpage'] . '</td>';
			echo '<td><a href="editpage.php?id=' . $row['content_id'] . '">Edit</a></td>';
			echo '<td><a href="deletepage.php?id=' . $row['content_id'] . '">Delete</a></td>';
			echo "</tr>"; 
		}
        echo "</table>";
?>
</body>
</html>