<?php
//include constant.php
include('../constant/constant.php');

//get admin_ID
$ID = $_GET['ID'];

//create query
$query = "DELETE FROM admin WHERE ID = $ID";

//execute query
$result = mysqli_query($connect, $query);

//check query is executed or not
if($result==TRUE)
{
	//admin is deleted
	//session is used
	$_SESSION['delete'] = "<div class = 'success'>Admin is deleted successfully.</div>";

	//redirect to admin.php
	header('location:'.SITEURL.'admin/admin.php');
}
else
{
	//failed to delete
	$_SESSION['delete'] = "<div class = 'error'>Failed to delete Admin. Please try again.</div>";

	//redirect to admin.php
	header('location:'.SITEURL.'admin/admin.php');
}
//back to admin.php with display message
?>