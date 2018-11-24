<?php
 include('includes/connect-db.php');
 
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 $id = $_GET['id'];
 $paginated = $_GET['paginated'];
 
	if($paginated == "yes")
	{
		$paginated == "yes";
	}
	
	else
	{
		$paginated == "no";
	}
 
 	if($id=="")
	{
		?>
        <script language="javascript">
 
 			alert('Nothing Selected.');
 
 		</script>
        <?php
		exit;
	}
	else
	{
?>
 
 <script language="javascript">
 
 var delmsg = confirm("Do you confirm to delete sub category <?php echo $id; ?>?"); 
 
 	if(delmsg==true)
 	{
		alert('Sub-Category Deletion Confirmed');
		
		location.href='delconfirm.php?type=subcat&paginated=<?php echo $paginated;?>&id=<?php echo $id; ?>';	
	}
 	else
 	{
		alert('Sub-Category Deletion Cancelled');
		location.href='viewsubcat.php';
		
	}	
 </script>
 	 
 <?php
	}

 }
 else
 {
?>

<script>window.location.href='viewsubcat.php';</script>

<?php
 }
 
?>
