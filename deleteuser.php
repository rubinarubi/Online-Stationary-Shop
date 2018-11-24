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
	
	if($id == 0001)
	{
		?>
			<script language="javascript">
				alert("Sorry You Can't Delete This User");
				location.href='viewusers.php';
			</script>
		<?php
	}
		
	else
	{
?>
 
 <script language="javascript">
 
 var delmsg = confirm("Do you confirm to delete user <?php echo $id; ?>?"); 
 
 	if(delmsg==true)
 	{
		alert('User Deletion Confirmed');
		
		location.href='delconfirm.php?type=user&paginated=<?php echo $paginated;?>&id=<?php echo $id; ?>';	
	}
 	else
 	{
		alert('User Deletion Cancelled');
		location.href='viewusers.php';
		
	}	
 </script>
 	 
 <?php
	}

 }
 else
 {
?>

<script>window.location.href='viewusers.php';</script>

<?php
 }
 
?>
