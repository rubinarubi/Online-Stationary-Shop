<?php

include ("includes/mysqli_connection.php");

$prodname = mysqli_real_escape_string($db_conx,$_POST['Name']);
echo $prodname;
$path = mysqli_real_escape_string($db_conx,$_POST['Path']);
echo $path;
$category = mysqli_real_escape_string($db_conx,$_POST['Category']);
echo $category;
$price = mysqli_real_escape_string($db_conx,$_POST['Price']);
echo $price;
$desc = mysqli_real_escape_string($db_conx,$_POST['Desc']);
echo $desc;

$type = mysqli_real_escape_string($db_conx,$_POST['Type']);
echo $type;

	$sql = "SELECT COUNT(*) FROM product WHERE path = '$path'";
	
	$query = mysqli_query($db_conx, $sql);
	
	$row = mysqli_fetch_row($query);
	
	$rows = $row[0];
	echo $rows;
	if($rows == 0)
	{	
		$insertSQL = "INSERT INTO product (prodname, path, category, price, descr, type)
				VALUES ('$prodname', '$path', '$category', '$price', '$desc', '$type')";
			
		mysqli_query($db_conx, $insertSQL);
		
		if($insertSQL)
		{
			echo "<script>alert('Successfully Added!')</script>";
			
			echo "<script>window.location.href='viewprod.php'</script>";
        }
        else
		{
            echo 'An error occured while uploading the entry to database. Please try again later.';
        }
	}
	else
	{
		echo "<font color='red'>Sorry This Product already exists!</font>";
		echo "<script>alert('Redirecting...')</script>";
   		echo "<script>window.location.href='newprod.php'</script>";
	}
	
	mysqli_close($db_conx);
?>