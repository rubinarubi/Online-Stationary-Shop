<?php
	include("includes/mysqli_connection.php");

	$sql = "SELECT COUNT(*) FROM product";
	$query = mysqli_query($db_conx, $sql);
	$row = mysqli_fetch_row($query);
	$rows = $row[0];
	$page_rows = 8;

	$limit = 'LIMIT ' . $page_rows;
	$sql = " SELECT * FROM product ORDER BY RAND( ) " . $limit ;
	$query = mysqli_query($db_conx, $sql);
	$textline1 = "Random Product - Refresh To View More Items";

	$list = '';

	$src = "Photos/";

	if(!isset($_SESSION['username']))
	{
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
		{
		
		$id = $row["id"];
		$prodname = $row["prodname"];
		$path = $row["path"];
		$category = $row["category"];
		$price = "Tk. " . $row["price"];
		$desc = $row["descr"];
		$width="150px";
		$height="150px";

		$list .='
		<div>
		 <div class="image"><a href="' . $src . $path . '"><img width="' . $width . '" height="' . $height . '" src="' . $src . $path . '" alt = "' . $prodname . '"></a></div>';
		 $list .='
		   <div class="proName">
			<div class="name"><a href="' . $src . $path . '">' . $desc . '</a></div>
			<div class="price">' . $price . '</div>
			<div class="cart">
				<label class="btn">';
										
				$list .='
				</label>
			</div>
		  </div>
		</div>
		'; 

		}
	}

	else
	{
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
		{
		
		$id = $row["id"];
		$prodname = $row["prodname"];
		$path = $row["path"];
		$category = $row["category"];
		$price = "Tk. " . $row["price"];
		$desc = $row["descr"];
		$width="150px";
		$height="150px";

		$list .='
		<div>
		 <div class="image"><a href="' . $src . $path . '"><img width="' . $width . '" height="' . $height . '" src="' . $src . $path . '" alt = "' . $prodname . '"></a></div>';
		 $list .='
		   <div class="proName">
			<div class="name"><a href="' . $src . $path . '">' . $desc . '</a></div>
			<div class="price">' . $price . '</div>
			<div class="cart">
				<label class="btn">';
				
				$list .='<form method="post" action="view.php"><input type="hidden" name="txtid" value="'.$id.'"><input type="submit" value="Add to Cart" class="button"/></form>';
									
				$list .='
				</label>
			</div>
		  </div>
		</div>
		'; 

		}
	}
		mysqli_close($db_conx);

		if($rows == 0)
		{
			echo "<h2>Nothing to display</h2>";
		}
		
		else
		{
			echo "<h2 align='center'>" . $textline1 . "</h2>";
			echo $list;
		}
?>