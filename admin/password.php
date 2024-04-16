<?php
include ('header-footer/header.php');
?>

<div class= "main-content">
	<div class= "wrapper">
		<h1>Change Admin Password</h1>
		<br>

		<?php
		if(isset($_GET['ID']))
		{
			$ID = $_GET['ID'];
		}
		?>

		<form action = "" method = "POST">
			<table class = "table-width">
				<tr>
					<td>Old Password: </td>
					<td>
						<input type = "password" name = "oldPassword" placeholder="Old Password">
					</td>
				</tr>

				<tr>
					<td>New Password: </td>
					<td>
						<input type = "password" name = "newPassword" placeholder="New Password">
					</td>
				</tr>

				<tr>
					<td>Confirm Password: </td>
					<td>
						<input type = "password" name = "confirmPassword" placeholder="Confirm Password">
					</td>
				</tr>

				<tr>
					<td colspan = "2">
						<input type="hidden" name = "ID" value = "<?php echo $ID; ?>">
						<input type = "submit" name = "submit" value = "Change Password" class = "btn-secondary">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>

<?php
if(isset($_POST['submit']))
{
	//get data
	$ID = $_POST['ID'];
	$oldPassword = md5($_POST['oldPassword']);
	$newPassword = md5($_POST['newPassword']);
	$confirmPassword = md5($_POST['confirmPassword']);

	//create query
	$query = "SELECT * FROM admin WHERE ID=$ID AND admin_password='$oldPassword'";

	//execute query
	$result = mysqli_query($connect, $query);

	if($result==TRUE)
	{
		//check data
		$count = mysqli_num_rows($result);

		if($count==1)
		{
			//get data
			if($newPassword==$confirmPassword)
			{
				//update password
				//create query
				$query2 = "UPDATE admin SET 
				admin_password = '$newPassword'
				WHERE ID = $ID
				";

				//execute query
				$result2 = mysqli_query($connect, $query2);

				//check if query executed
				if($result2==TRUE)
				{
					$_SESSION['update-password'] = "<div class = 'success'>Password is updated successfully.</div>";

					//redirect to admin.php
					header('location:'.SITEURL.'admin/admin.php');
				}
				else
				{
					$_SESSION['update-password'] = "<div class = 'error'>Failed to update Admin Password. Please try again</div>";

					//redirect to admin.php
					header('location:'.SITEURL.'admin/admin.php');
				}

			}
			else
			{
				//redirect to admin.php
				//no data
			    $_SESSION['not-match'] = "<div class = 'error'>New Password and Confirm Password didn't match.</div>";

				//redirect to admin.php
				header('location:'.SITEURL.'admin/admin.php');
			}
		}
		else 
		{
			//no data
			$_SESSION['no-user'] = "<div class = 'error'>Wrong current password. Please try again.</div>";

			//redirect to admin.php
			header('location:'.SITEURL.'admin/admin.php');
		}
	}
}
?>

<?php
include ('header-footer/footer.php');
?>