<?php

include('../constant/constant.php');

//get data
if(isset($_GET['ID_order']))
{
	//get data
	$ID_order = $_GET['ID_order'];

	//delete order from database
	$query = "DELETE FROM table_order WHERE ID_order = $ID_order";

	$result = mysqli_query($connect, $query);

	if($result==TRUE)
	{
		$_SESSION['delete-order'] = "<div class = 'success'>Order is deleted succesfully.</div>";

		header('location:' .SITEURL.'admin/manage-order.php');
	}
	else
	{
		$_SESSION['delete-order'] = "<div class = 'error'>Failed to delete Order. Please try again.</div>";

		//redirect to manage-order.php
		header('location:' .SITEURL.'admin/manage-order.php');
	}
}
else 
{
	$_SESSION['delete-order'] = "<div class = 'error'>Failed to delete Order. Please try again.</div>";

	//redirect to manage-order.php
	header('location:' .SITEURL.'admin/manage-order.php');
}

?>