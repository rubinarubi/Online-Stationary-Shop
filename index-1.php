<?php
session_start(); 
if (isset($_SESSION['user_id'])) { 
	$userid = $_SESSION['user_id']; 
}
else { 
	$userid = ""; 
}
?>

<?php
if (isset($_SESSION['username'])) { 
	$User = $_SESSION['username']; 
}
else {
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
	
		<div class="box mb0" id="randomfeatured">
		<div class="box-heading-1"><span>Random Stationary items</span></div>
			<div class="box-content-1">
				<div class="box-product-1" >
					<?php
						include("randomfeatured.php");
					?>
				</div>
			</div>
		</div>
		<?php include("footer.php");?>
</div>
		<?php include("flexslider.php");?>
 
</body>
</html>