<?php

include ("includes/mysqli_connection.php");

$mainid = mysqli_real_escape_string($db_conx,$_POST['Mainid']);
$name = mysqli_real_escape_string($db_conx,$_POST['Name']);
$link = mysqli_real_escape_string($db_conx,$_POST['Link']);

	$sql = "SELECT COUNT(*) FROM sub_menu WHERE smenu_name LIKE '$name'";
	
	$query = mysqli_query($db_conx, $sql);

	$row = mysqli_fetch_row($query);
	
	$rows = $row[0];
	
	if($rows == 0)
	{	
		$insertSQL = "INSERT INTO sub_menu (mmenu_id, smenu_name, smenu_link)
				VALUES ('$mainid', '$name', '$link')";
			
		mysqli_query($db_conx, $insertSQL);
		
		if($insertSQL)
		{
			echo "<script>alert('Successfully Added!')</script>";
			
			echo "<script>window.location.href='viewsubcat.php'</script>";
        }
        else
		{
            echo 'An error occured while uploading the entry to database. Please try again later.';
        }
	}
	
	else
	{
		echo "<font color='red'>Sorry This Sub Menu already exists!</font>";
		echo "<script>alert('Redirecting...')</script>";
   		echo "<script>window.location.href='newsubcat.php'</script>";
	}
	
	mysqli_close($db_conx);
?>