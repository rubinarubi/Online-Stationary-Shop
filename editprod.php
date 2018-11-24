<?php
session_start();
include("includes/mysqli_connection.php");

if (!isset($_SESSION['username']))
{
	echo "<script>alert('Admin Says : : Login First :-( !!!')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else if(!isset($_SESSION['status']) )
{
	echo "<script>alert('Checking!!!: :')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else
{
	$admin = $_SESSION['username'];
}

?>

<?php

if(isset($_SESSION['username']))
{
	$id = $_GET['id'];
	
	$sql = ("SELECT * FROM product WHERE id=$id");
	$query = mysqli_query($db_conx,$sql);
	
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
	{
		$id = $row['id'];
		$prodname = $row['prodname'];
		$path = $row['path'];
		$category = $row['category'];
		$price = $row['price'];
		$descr = $row['descr'];
		$type = $row['type'];
	}
}

else
{
	echo "ERROR!!!";
	$id = "";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>EDIT PRODUCT PAGE</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
<script type="text/javascript">
<!--  Begin

function resetform()
{
document.forms[0].elements[1]=="";
}

function submitForms()
{
if (isName() && isPath() && isCategory() && isPrice() && isDesc() && isType())
if (confirm("\n You are about to submit this form. \n\nPress Ok to submit. otherwise Cancel ."))
{
alert("Your form has been sent successfully.");
return true;
}
else
{
alert("You have chosen to cancel the registration.");
return false;
}
else 
return false;
}


function acceptw()
{
if(event.keyCode>45 && event.keyCode<57)
{
event.returnValue=false
window.alert("Sorry ! You can only enter Words.")
}
else
{
if(event.which>45 && event.which<57)
{
event.returnValue=false
window.alert("Sorry ! You can only enter Words.")
}
}
}


function isName()
{
if (document.forms[0].elements[0].value == "")
{
alert ("The Name field is blank. Please enter your Name.")
document.forms[0].elements[0].focus();
return false;
}
return true;
}


function isPath()
{
if (document.forms[0].elements[1].value == "")
{
alert ("The Path field is blank. \n\nPlease enter Path.")
document.forms[0].elements[1].focus();
return false;
}
return true;
}


function isCategory()
{
if (document.forms[0].elements[2].value == "")
{
alert ("The Category field is blank. \n\nPlease enter Category.")
document.forms[0].elements[2].focus();
return false;
}
return true;
}


function isPrice()
{
if (document.forms[0].elements[3].value == "")
{
alert ("The Price field is blank. \n\nPlease enter Price.")
document.forms[0].elements[3].focus();
return false;
}
return true;
}


function isDesc()
{
if (document.forms[0].elements[4].value == "")
{
alert ("The Description field is blank. \n\nPlease enter Description")
document.forms[0].elements[4].focus();
return false;
}
return true;
}

function isType()
{
if (document.forms[0].elements[5].value == "")
{
alert ("The Type field is blank. Please enter Type.")
document.forms[0].elements[5].focus();
return false;
}
return true;
}
// End -->
</script>
</head>
<body>

<p align="center"><b>EDIT PRODUCT PAGE</b></p>

<?php echo 'Hi, <strong>' . strtoupper($admin) . '</strong> Good To See You Working! || <a href="logout.php"> Logout </a>'; ?>

<br />
<div align="center">
	<?php include("adminmenu.php");?>
</div>
<br />
<div align="center">
<table border="0" cellpadding="1" cellspacing="0" width="100%">
  <tr>
    <td colspan="5" height="96">
		<form name="formRegister" method="post" action="confirmeditprod.php" onSubmit="return submitForms()">
        <table width="400" align="center" border="0">
        <tr>
            <td bgColor="c6d3ce">
              <table width="400" border="0">
			  <tr bgColor="dee7e7">
				 <td width="165"><strong>ID : <?php echo $id; ?></strong></td>
				 <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
			  </tr>
				<tr bgColor="dee7e7">
                  <td width="165">Name</td>
                  <td><b><input type="text" size="25" name="Name" value="<?php echo $prodname; ?>"></b></td>
                </tr>
                <tr bgColor="e7efef">
                  <td>Path</td>
                  <td><b><input type="text" size="25" name="Path" value="<?php echo $path; ?>"></b></td>
				</tr>
                <tr bgColor="e7efef">
                  <td>Category</td>
                  <td><b><input type="text" size="20" name="Category" value="<?php echo $category; ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></b></td>
                </tr>
                <tr bgColor="e7efef">
                  <td>Price</td>
                  <td><b><input type="text" name="Price" size="20" value="<?php echo $price; ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></b></td>
                </tr>
                <tr bgColor="e7efef">
                  <td>Description</td>
                  <td><b><input type="text" size="30" name="Descr" value="<?php echo $descr; ?>"></b></td>
                </tr>
                  <td>Type</td>
                  <td><b><input type="text" size="10" name="Type" value="<?php echo $type; ?>"></b></td>
				</tr>				
				</table>
            </td>
        </tr>
        </table>
        <br>
        <table width="400" align="center" border="0">
          <tr>
            <td align="center" width="200"><input type="submit" value="Submit"></td>
            <td align="center" width="200"><input type="reset" name="reset" value="Reset Form" onClick="return confirm('Are you sure you want to reset the current information?');"></td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>
</div>
</body>
</html>