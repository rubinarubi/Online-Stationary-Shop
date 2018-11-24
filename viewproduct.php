<?php
include("includes/mysqli_connection.php");
session_start();
$item=$_GET['Items'];
echo $item;
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
	
			<!--View Product Start-->
			<div class="box mb0">
				<div class="box-heading-1"><span>Items</span></div>
				<div class="box-content-1">
					<div class="box-product-1" >
						<?php
							
							$sql = "SELECT COUNT(*) FROM `main_menu`, sub_menu, product where main_menu.mmenu_id = sub_menu.mmenu_id and product.category = sub_menu.id and product.category = $item";
							$query = mysqli_query($db_conx, $sql);
							$row = mysqli_fetch_row($query);
							$rows = $row[0];
							$page_rows = 8;
							$last = ceil($rows/$page_rows);
							$Display_Pages = 10;
							if($last < 1){
								$last = 1;
							}
							$pagenum = 1;
							if(isset($_GET['pn'])){
								$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
							}
							
							if ($pagenum < 1) { 
								$pagenum = 1; 
							} else if ($pagenum > $last) { 
								$pagenum = $last; 
							}

							$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

							$sql = " SELECT * FROM `main_menu`, sub_menu, product where main_menu.mmenu_id = sub_menu.mmenu_id and product.category = sub_menu.id and product.category = $item $limit";

							$query = mysqli_query($db_conx, $sql);
							
							$query2 = mysqli_query($db_conx, $sql);
							$rowtext = mysqli_fetch_row($query2);
							
							$textline1 = "You Selected: " . $rowtext[1] . " - " . $rowtext[5] . " (<b>$rows</b>)";
							$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
							$paginationCtrls = '';

							if($last != 1){

								if ($pagenum > 1) {
									$First = $pagenum == 1;
									$previous = $pagenum - 1;
									$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?Items='.$item.'&pn='.$First.'">First</a> &nbsp; &nbsp; ';
									$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?Items='.$item.'&pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';

									for($i = $pagenum-$Display_Pages; $i < $pagenum; $i++){
										if($i > 0){
											$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?Items='.$item.'&pn='.$i.'">'.$i.'</a> &nbsp; ';
										}
									}
								}

								$paginationCtrls .= ''.$pagenum.' &nbsp; ';

								for($i = $pagenum+1; $i <= $last; $i++){
									$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?Items='.$item.'&pn='.$i.'">'.$i.'</a> &nbsp; ';
									if($i >= $pagenum+$Display_Pages){
										break;
									}
								}

								if ($pagenum != $last) {
									$next = $pagenum + 1;
									$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?Items='.$item.'&pn='.$next.'">Next</a> &nbsp; &nbsp; ';
									
									$Last = $last;
									
									$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?Items='.$item.'&pn='.$Last.'">Last</a>';
								}
							}
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
								$price = "TK. " . $row["price"];
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
						?>
						
						<?php
							if($rows == 0)
							{
								echo "<h2 align='center'>Nothing to display</h2>";
							}
							
							else
							{
								echo "<h2>" . $textline1 . " Paged</h2>";
								echo "<p>" . $textline2 . "</p>";
								echo $list;
								echo "<p align='center'>" . $paginationCtrls . "</p>";
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