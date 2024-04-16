<?php
include ('header-footer/header.php');
?>

<div class = "main-content">
	<div class = "wrapper">
		<h1>Add Admin</h1>
		<br>

		<?php
		if(isset($_SESSION['add']))
		{
			echo $_SESSION['add'];//display message
			unset ($_SESSION['add']);//remove message
		}
		?>

		<form action = "" method = "POST">
			<table class ="table-admin">
				<tr>
					<td>Username: </td>
					<td><input type = "text" name = "admin_username" placeholder = "Enter Username"></td>
				</tr>

				<tr>
					<td>Full Name: </td>
					<td><input type = "text" name = "admin_fullname" placeholder = "Enter Full Name"></td>
				</tr>

				<tr>
					<td>Password: </td>
					<td><input type = "password" name = "admin_password" placeholder = "Enter Password"></td>
				</tr>

				<tr>
					<td colspan = "2">
						<input type = "submit" name = "submit" value = "Add Admin" class = "btn-secondary">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>

<?php
include ('header-footer/footer.php');
?>

<?php
if(isset($_POST['submit']))
{
	//button is clicked
	//echo "Button is clicked";

	//get the data from form
    $admin_username = $_POST['admin_username'];
    $admin_fullname = $_POST['admin_fullname'];
    $admin_password = md5($_POST['admin_password']);//password encryption

    //create sql query to save the data 
    $query = "INSERT INTO admin SET
        admin_username = '$admin_username',
        admin_fullname = '$admin_fullname',
        admin_password = '$admin_password'
    ";

    //execute query and save the data to database
    $result = mysqli_query($connect, $query) or die(mysqli_error());

    //check wether the data is saved or not
    if($result==TRUE)
    {
    	//id data is saved
    	//session is used to display message
    	$_SESSION['add'] = "<div class = 'success'>Admin is added succesfully.</div>";

    	//redirect page to add-admin.php
    	header("location:".SITEURL.'admin/admin.php');
    }
    else
    {
    	//data ISNT saved
    	//session is used to display message
    	$_SESSION['add'] = "<div class = 'error'>Failed to add Admin. Please try again.</div>";

    	//redirect page to add-admin.php
    	header("location:".SITEURL.'admin/add-admin.php');
    	
    }

}
?>