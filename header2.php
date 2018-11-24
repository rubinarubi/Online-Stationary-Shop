<?php

if (isset($_SESSION['user_id']))
{
	$userid = $_SESSION['user_id'];
}

if (isset($_SESSION['username']))
{
	$User = $_SESSION['username'];
}

else
{
	$User = "";
}
?>

<?php
	
	include("includes/mysqli_connection.php");
	
	$sql = "SELECT COUNT(*) FROM cart WHERE cust_id = $userid AND checkout = 'n'";
	
	$query = (mysqli_query($db_conx,$sql));
	
	$row = mysqli_fetch_row($query);
	$rows = $row[0];
	
	$countrows = $rows;
	
	$totalquantity = 0;
	
	$subtotal = 0;
	
	$totalamount = 0;
	
	$vat = 0.15;
	
	$delivery = 500;
	
	$selectproducts = "SELECT * FROM cart , product WHERE cart.cust_id = $userid AND product.id = cart.product_id AND checkout = 'n'";
	
	$query = mysqli_query($db_conx, $selectproducts);
		
	for($loop = 0; $loop < $countrows; $loop++)
	{
		
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
		{
			$productid = $row["product_id"];
			$qty = $row["qty"];
			$userid = $row["cust_id"];
			$checkout = $row["checkout"];
			
			$prodname = $row["prodname"];
			$path = $row["path"];
			$category = $row["category"];
			$price = $row["price"];
			$desc = $row["descr"];
			$width="150px";
			$height="150px";
			
			$amount = ($qty * $price);
			
			$amount = round($amount);
			if (round($amount*10) == $amount*10 && round($amount)!=$amount) $amount = "$amount"."0"; 
			{
				if (round($amount) == $amount) 
				{
					$amount  = "$amount".".00";
				}
			}
			
			$totalquantity = $totalquantity + $qty;
			$subtotal = $subtotal + $amount;
			$vat = round(0.15 * $subtotal);
					
			$totalamount = ($subtotal + $vat + $delivery);
		}
	}
?>
<header id="headerWrapper">
	<div id="header">
		<div id="logo">
			<a href="index-1.php"><img src="image/stationary_logo.jpg" title="This is our Logo" alt="Our Logo" /></a>
		</div>
		<div id="cart">
			<div class="heading"><a href="cart.php"><span id="cart-total"><?php echo $countrows;?> item(s) - Tk <?php echo $totalamount;?></span></a></div>
			
		</div>
			<?php
			echo '<div id="welcome"> Welcome !!!... <b>' . $User . '</b> || <a href="logout.php">Log Out</a></div>';
			?>
	</div>
		<?php include("navigation.php");?>	
	<div id="SearchDiv" class="SearchDiv">
			
	</div>
	
</header>
