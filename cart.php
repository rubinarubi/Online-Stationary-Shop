<?php

session_start();

if (isset($_SESSION['user_id']))
{
	$userid = $_SESSION['user_id'];
	echo "userid: " . $userid;
}

else
{
	$userid = "";
}
?>

<?php
if (isset($_SESSION['username']))
{
	$User = $_SESSION['username'];
}

else
{
	$User = "";
}
?>

<?php include("head1.html");?>

<?php 
if($User != "")
{
	include("top_links2.php");
}
else
{
	include("top_links.php");
}
?>

<div id="wrapper">

	<?php 
	if($User != "")
	{
		include("header2.php");
	}
	else
	{
		include("header.php");
	}
	?>
	
	<?php include("section.html"); ?>
	
		<div class="box mb0" id="cart">
		<div class="box-heading-1"><span>SHOPPING CART</span></div>
			<div class="box-content-1">
				<div class="box-product-1" >
					<?php
						
						include("includes/mysqli_connection.php");
						
						$sql = "SELECT COUNT(*) FROM cart WHERE cust_id = $userid AND checkout = 'n'";
						
						$query = (mysqli_query($db_conx,$sql));
						
						$row = mysqli_fetch_row($query);
						
						$rows = $row[0];
						
						$totalquantity = 0;
						
						$subtotal = 0;
						
						$totalamount = 0;
						
						$vat1 = 0;
						
						$selectproducts = "SELECT * FROM cart , product WHERE cart.cust_id = $userid  AND cart.checkout = 'n' AND product.id = cart.product_id";
						
						$query = mysqli_query($db_conx, $selectproducts);
						
						$list = "";
						$src = "Photos/";

						if($rows == 0)
						{
							echo "<script>alert('No Items In Cart')</script>";
							echo "<script>window.location.href='index-1.php';</script>";
						}
						
						else
						{
							$delivery = 500;
							$vat = 0.15;
							
							echo '<center>';
							echo '<table align="center" border="1" cellspacing="1" cellpadding="0" width="75%">
									<th align="center" bgcolor="e6e6e6">PRODUCT ID</th><th align="center" bgcolor="e6e6e6">PRODUCT</th>
									<th align="center" bgcolor="e6e6e6">QUANTITY</th><th align="center" bgcolor="e6e6e6">PRICE</th>
									<th align="center" bgcolor="e6e6e6">AMOUNT</th>
									<th align="center" bgcolor="e6e6e6" colspan="2">UPDATE QTY</th>
									<th align="center" bgcolor="white">ADDED ON</th>
									<th align="center"><font color="red">REMOVE ITEM</font></th>';
									
									
							for($loop = 0; $loop < $rows; $loop++)
							{
								
								while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
								{
									$productid = $row["product_id"];
									$qty = $row["qty"];
									$userid = $row["cust_id"];
									$checkout = $row['checkout'];
									$dateadd = $row['added'];
									$datechecked = $row['checkedon'];
									

									$dateadd = date($dateadd);

									$name = $row["prodname"];
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
									
									if($subtotal == 0)
									{
										$vat = 0;
									}
									
									else
									{
										$vat1 = round($vat * $subtotal);
										
										if($vat1 > 0)
										{
											$vat1 = $vat1;
										}
										
										else
										{
											$vat1 =0;
										}
									}
									
									$totalamount = ($subtotal + $vat1 + $delivery);
									
									$list ='<tr align="center"><td>' . $productid . '</td><td>' . $name . '</td><td>' . $qty . '</td>';
									$list .= '<td>' . $price . '</td><td>' . $amount . '</td>';
									$list .='<td><form method="post" action="updateqty.php"><input type="hidden" size="4" name="productid" value="' . $productid .'" /><input type="submit" value="+1" /></form></td>';
									$list .='<td><form method="post" action="removeqty.php"><input type="hidden" size="4" name="productid" value="' . $productid .'" /><input type="submit" value="-1" name="submit" /></form></td>';
									$list  .='<td>' . $dateadd . '</td>';
									$list .='<td><form method="post" action="remove.php"><input type="hidden" size="4" name="productid" value="' . $productid .'" /><input type="submit" value="X" name="submit" /></form></td></tr>';

									echo $list;	
								}
							}
							echo "</table></center><br />";	
						}
					?>

					<table border="1" align="center" width="300px">
						<tr align="center">
							<td width="150px"><font face=""><b>Total Quantity</b></font></td><td width="150px"><?php echo $totalquantity;?></td>
						</tr>
						<tr align="center">
							<td width="150px"><b>Total Items</b></td><td width="150px"><?php echo $rows;?></td>
						</tr>
						<tr align="center">
							<td><b>Sub Total</b></td><td><?php echo $subtotal;?></td>
						</tr>
						<tr align="center">
							<td><b>VAT (15%)</b></td><td><?php echo $vat1;?></td>
						</tr>
						<tr align="center">
							<td><b>Delivery Cost</b></td><td><?php echo $delivery;?></td>
						</tr>
						<tr align="center">
							<td><b>Total Amount</b></td><td><?php echo $totalamount;?></td>
						</tr>
					</table>			
					<?php
					 if(!$rows == 0)
					 {
					?>
					<p align="center"><input type="button" value="Checkout" onClick="javascript:location.href='checkout.php';"></p>
					<?php
					 }
					?>
				</div>
			</div>
		</div>
		
		<?php include("footer.php");?>
</div>

		<?php include("flexslider.php");?>
</body>
</html>