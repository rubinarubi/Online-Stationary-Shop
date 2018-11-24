<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>VIEW SUB CATEGORY RECORDS - PAGINATED</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>
<body>

<?php

if (!isset($_SESSION['username']))
{
	echo "<script>alert('Admin Says : : Login First :-( !!!')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else if(!isset($_SESSION['status']) )
{
	echo "<script>alert('Checking !!!: :')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else
{
	$admin = $_SESSION['username'];
}

?>

<p align="center"><b>VIEW SUB CATEGORY RECORDS - PAGINATED</b></p>

<?php echo 'Hi, <strong>' . $admin . '</strong> Good To See You Working! || <a href="logout.php"> Logout </a>'; ?>

<br />
<div align="center">
	<?php include("adminmenu.php");?>
</div>

<?php

        include('includes/connect-db.php');        
        $per_page = 5;        
        $result = mysql_query("SELECT * FROM main_menu , sub_menu WHERE main_menu.mmenu_id = sub_menu.mmenu_id ORDER BY sub_menu.id ASC");
        $total_results = mysql_num_rows($result);
        $total_pages = ceil($total_results / $per_page);

        if (isset($_GET['page']) && is_numeric($_GET['page']))
        {
                $show_page = $_GET['page'];
                
                if ($show_page > 0 && $show_page <= $total_pages)
                {
                        $start = ($show_page -1) * $per_page;
                        $end = $start + $per_page; 
                }
                else
                {
                        $start = 0;
                        $end = $per_page; 
                }               
        }
        else
        {
                $start = 0;
                $end = $per_page; 
        }
                
        echo "<p><a href='viewsubcat.php'>View All</a> | <b>View Page:</b> ";
        for ($i = 1; $i <= $total_pages; $i++)
        {
                echo "<a href='viewsubcat-paginated.php?page=$i'>$i</a> ";
        }
        echo " | <a href='newsubcat.php'>Enter New Sub Category</a></p>";
                
        echo "<table align='center' border='1' cellpadding='10'>";
		
        echo "<tr> <th>MENU ID</th> <th>MAIN MENU ID</th>  <th>MAIN MENU NAME</th> <th>SUB MENU NAME</th> <th>SUB MENU LINK</th> <th></th> <th></th></tr>";

        for ($i = $start; $i < $end; $i++)
        {

                if ($i == $total_results) { break; }
        
				echo "<tr>";
				echo '<td>' . mysql_result($result, $i, 'id') . '</td>';
				echo '<td>' . mysql_result($result, $i, 'mmenu_id') . '</td>';
				echo '<td>' . mysql_result($result, $i, 'mmenu_name') . '</td>';
				echo '<td>' . mysql_result($result, $i, 'smenu_name') . '</td>';
				echo '<td>' . mysql_result($result, $i, 'smenu_link') . '</td>';
				echo '<td><a href="editsubcat.php?id=' . mysql_result($result, $i, 'id') . '">Edit</a></td>';
				echo '<td><a href="deletesubcat.php?paginated=yes&id=' . mysql_result($result, $i, 'id') . '">Delete</a></td>';
				echo "</tr>";
        }
        echo "</table>";                 
?>
</body>
</html>