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
		<div class="box mb0" id="viewproducts">
		<div class="box-heading-1"><span>VIEW PRODUCTS</span></div>
			<div class="box-content-1">
				<div class="box-product-1" >
					<center>
					<?php
						include("includes/mysqli_connection.php");

						$id = $_POST['txtid'];
						//echo $id;

						$sql = "SELECT COUNT(*) FROM product";
						$query = mysqli_query($db_conx, $sql);
						$row = mysqli_fetch_row($query);
						$rows = $row[0];

						$sql = " SELECT * FROM product WHERE  id =".$id;
						$query = mysqli_query($db_conx, $sql);

						$list = '';
						$src = "Photos/";

						while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
						{

							$id = $row["id"];
							$prodname = $row["prodname"];
							$path = $row["path"];
							$category = $row["category"];
							$price = "Tk. " . $row["price"];
							$desc = $row["descr"];
							$type = $row["type"];
							$noviews = $row["noviews"];
							$width="150px";
							$height="150px";

							$list .='
								<br />
								<table border="1" bordercolor="#FF0000" cellpadding="15">
									<tr><td><b>Name</b><td>' . $prodname . '</td></tr>
									<tr><td><b>Image</b></td><td><img width="' . $width . '" height="' . $height . '" src="' . $src . $path . '" alt = "' . $prodname . '"></td></tr>';
								 $list .='
									<tr><td><b>Description</b></td><td>' . $desc . '</<td></tr>
									<tr><td><b>Price</b></td><td>' . $price . '</td></tr>
								  </tr>
								</table>
								<br />'; 
						}

						$noviews += 1;

						$updateview = "UPDATE product SET noviews = $noviews WHERE id =".$id;
						mysqli_query($db_conx, $updateview);


					?>
						<br />
						<script type="text/javascript">
						function checkIt(evt)
						{
						evt = (evt) ? evt : window.event;
						var charCode = (evt.charCode) ? evt.charCode :
						((evt.which) ? evt.which : evt.keyCode);

						if (charCode > 31 && (charCode < 48 || charCode > 57))
						{
						status = "This field accepts numbers only.";
						return false;
						}
						status = "";
						return true;
						}
						</script>

						<script type="text/javascript">
						<!--  Begin
						function submitForms()
						{
						if (isCart())
						if (confirm("\n You are about to add this product to your cart. \n\nPress Ok to submit. Cancel to abort."))
						{
						return true;
						}
						else
						{
						alert("Product not added to cart");
						return false;
						}
						else 
						return false;
						}

						function isCart()
						{
						T = document.forms[0].elements[0].value;
						if(T == "")
						{
						alert("Quantity cannot be blank")
						document.forms[0].elements[0].focus();
						return false;                
						}

						else
						{
						if (T < 1)
						{
						alert("Quantity must not be less than 1")
						document.forms[0].elements[0].focus();
						return false;
						}

						else
						{
						if (T > 100)
						{
						alert("To order more than 100 contact to stationary shop.")
						document.forms[0].elements[0].focus();
						return false;
						}
						return true;
						}
						}
						}

						// End -->
						</script>
						<form action="processcheckout.php" method="post" onSubmit="return submitForms()" "returninPosInteger()">
						<?php echo $list;?>
						Enter Quantity:<input type="text" name="txtQty" size="8" onkeypress="return checkIt(event)">
						<input type="hidden" name="txtuserid" value="<?php echo $userid;?>">
						<input type="hidden" name="productid" value="<?php echo $id;?>">
						<input type="submit" value="Add to Cart">
						</form>
					</center>
				</div>
			</div>
		</div>

		<?php include("footer.php");?>
</div>
		<?php include("flexslider.php");?>
</body>
</html>