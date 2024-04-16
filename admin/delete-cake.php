<?php

include('../constant/constant.php');

//get data
if(isset($_GET['ID_cakes']) && isset($_GET['cakes_imagetitle']))
{
	//get data
	$ID_cakes = $_GET['ID_cakes'];
	$cakes_imagetitle = $_GET['cakes_imagetitle'];

	//delete cake from database
	$query = "DELETE FROM cakes WHERE ID_cakes = $ID_cakes";

	$result = mysqli_query($connect, $query);

	if($result==TRUE)
	{
		$_SESSION['delete-cake'] = "<div class = 'success'>Cake is deleted succesfully.</div>";

		header('location:' .SITEURL.'admin/manage-cake.php');
	}
	else
	{
		$_SESSION['delete-cake'] = "<div class = 'error'>Failed to delete cake. Please try again.</div>";

		//redirect to manage-cake.php
		header('location:' .SITEURL.'admin/manage-cake.php');
	}
}
else 
{
	$_SESSION['delete-cake'] = "<div class = 'error'>Failed to delete cake. Please try again.</div>";

	//redirect to manage-cake.php
	header('location:' .SITEURL.'admin/manage-cake.php');
}

?>