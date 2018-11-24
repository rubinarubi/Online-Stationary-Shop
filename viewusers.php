 <?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>VIEW USER RECORDS</title>
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
	echo "<script>alert('Checking !!!: :')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else
{
	$admin = $_SESSION['username'];
}

?>

<p align="center"><b>VIEW USER RECORDS</b></p>

<?php echo 'Hi, <strong>' . $admin . '</strong> Good To See You Working! || <a href="logout.php"> Logout </a>'; ?>

<br />
<div align="center">
	<?php include("adminmenu.php");?>
</div>

<?php

        include('includes/connect-db.php');

        $result = mysql_query("SELECT * FROM users ORDER BY user_id ASC") 
                or die(mysql_error());  
                
        echo "<p><b>View All</b> | <a href='viewusers-paginated.php?page=1'>View Paginated</a> | <a href='newuser.php'>Add a new record</a></p>";
        
        echo "<table align='center' border='1' cellpadding='10'>";
		
		echo "<tr> <th>ID</th> <th>First Name</th> <th>Last Name</th> <th>Username</th> <th>Password</th> <th>Email</th> <th>Address</th> <th>Tel</th> <th>Acc Type</th> <th>Status</th> <th></th> <th></th></tr>";

        while($row = mysql_fetch_array( $result )) {	
			echo "<tr>";
			echo '<td>' . $row['user_id'] . '</td>';
			echo '<td>' . $row['name'] . '</td>';
			echo '<td>' . $row['surname'] . '</td>';
			echo '<td>' . $row['username'] . '</td>';
			echo '<td>' . $row['password'] . '</td>';
			echo '<td>' . $row['email'] . '</td>';
			echo '<td>' . $row['address'] . '</td>';
			echo '<td>' . $row['tel'] . '</td>';
			echo '<td>' . $row['ac_type'] . '</td>';
			echo '<td>' . $row['user_status'] . '</td>';
			echo '<td><a href="edituser.php?id=' . $row['user_id'] . '">Edit</a></td>';
			echo '<td><a href="deleteuser.php?paginated=no&id=' . $row['user_id'] . '">Delete</a></td>';
			echo "</tr>"; 
		}

        echo "</table>";
?>
</body>
</html>