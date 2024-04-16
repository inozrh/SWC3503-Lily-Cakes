<?php
include ('header-footer/header.php');
?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update Admin</h1>
		<br>

		<?php
		//get admin_ID
		$ID = $_GET['ID'];

		//create query
		$query = "SELECT * FROM admin WHERE ID = $ID";

		//execute query
		$result = mysqli_query($connect, $query);

		//validation for admin_ID
		if($result==TRUE)
		{
			//check data
			$count = mysqli_num_rows($result);

			if($count==1)
			{
				//get data
				$row = mysqli_fetch_assoc($result);

				$admin_username = $row['admin_username'];
				$admin_fullname = $row['admin_fullname'];

				
			}
			else
			{
				//redirect to admin.php
				header('location:'.SITEURL.'admin/admin.php');
			}

		}

		?>

		<form action = "" method = "POST">
			<table class = "table-width">
				<tr>
					<td>Username: </td>
					<td>
						<input type = "text" name = "admin_username" value = "<?php echo $admin_username; ?>">
					</td>
				</tr>

				<tr>
					<td>Full Name: </td>
					<td>
						<input type = "text" name = "admin_fullname" value = "<?php echo $admin_fullname; ?>">
					</td>
				</tr>

				<tr>
					<td colspan = "2">
						<input type="hidden" name = "ID" value = "<?php echo $ID; ?>">
						<input type = "submit" name = "submit" value = "Update Admin" class = "btn-secondary">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>

<?php
//check button is clicked or not
if(isset($_POST['submit']))
{
	//get data from form
	$ID = $_POST['ID'];
	$admin_username = $_POST['admin_username'];
	$admin_fullname = $_POST['admin_fullname'];

	//create query
	$query = "UPDATE admin SET 
	admin_username = '$admin_username',
	admin_fullname = '$admin_fullname'
	WHERE ID = '$ID'
	";

	//execute query
	$result = mysqli_query($connect, $query);

	//check if query executed 
	if($result==TRUE)
	{
		//query executed
		//session is used
		$_SESSION['update'] = "<div class = 'success'>Admin is updated successfully.</div>";

		//redirect to admin.php
		header('location:'.SITEURL.'admin/admin.php');
	}
	else 
	{
		//failed to update
		$_SESSION['update'] = "<div class = 'error'>Failed to update Admin. Please try again.</div>";

		//redirect to admin.php
		header('location:'.SITEURL.'admin/admin.php');
	}
}
?>

<?php
include ('header-footer/footer.php');
?>