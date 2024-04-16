<?php
include ('header-footer/header.php');
?>

<?php
if(isset($_GET['ID_cakes']))
{
	//get data from manage-cake.php
	$ID_cakes = $_GET['ID_cakes'];

	//create query
	$query = "SELECT * FROM cakes WHERE ID_cakes = $ID_cakes";

	//execute query
	$result = mysqli_query($connect, $query);

	//get value in database
	$row = mysqli_fetch_assoc($result);

	//get individual data
	$cakes_title = $row['cakes_title'];
	$cakes_description = $row['cakes_description'];
	$cakes_price = $row['cakes_price'];
	$cakes_imagetitle = $row['cakes_imagetitle'];


}
else
{
	//redirect to manage-cake.php
	header('location:'.SITEURL.'admin/manage-cake.php');
}
?>

<div class = "main-content">
	<div class = "wrapper">
		<h1>Update Cake</h1>
		<br>

		<form action = "" method = "POST" enctype="multipart/form-data">
			<table class = "table-admin">
				<tr>
					<td>Cake Name: </td>
					<td>
						<input type = "text" name = "cakes_title" value = "<?php echo $cakes_title; ?>">
					</td>
				</tr>

				<tr>
					<td>Description: </td>
					<td>
						<textarea name = "cakes_description" cols = "22" rows = "5"><?php echo $cakes_description; ?></textarea>
					</td>
				</tr>

				<tr>
					<td>Price: </td>
					<td>
						<input type = "number" name = "cakes_price" value = "<?php echo $cakes_price; ?>">
					</td>
				</tr>

				<tr>
					<td>Cake Image:</td>
					<td>
						<?php
						if($cakes_imagetitle == "")
						{
							echo "<div class = 'error'>No image in database.</div>";
						}
						else
						{
							?>
							<img src = "<?php echo SITEURL; ?>images/cakes/<?php echo $cakes_imagetitle; ?>" width = "164px">
							<?php
						}
						?>
					</td>
				</tr>

				<tr>
					<td>New Cake Image:</td>
					<td>
						<input type = "file" name = "image">
					</td>
				</tr>

				<tr>
					<input type = "hidden" name = "ID_cakes" value = "<?php echo $ID_cakes; ?>">
					<input type = "hidden" name = "$cakes_imagetitle" value = "<?php echo $cakes_imagetitle; ?>">
					<td colspan = "2">
						<input type = "submit" name = "submit" value = "Update Cake" class = "btn-secondary">
					</td>
				</tr>
			</table>
		</form>

		<?php
		if(isset($_POST['submit']))
		{
			//get data from form
			$ID_cakes = $_POST['ID_cakes'];
			$cakes_title = $_POST['cakes_title'];
			$cakes_description = $_POST['cakes_description'];
			$cakes_price = $_POST['cakes_price'];
			$cakes_imagetitle = $_POST['cakes_imagetitle'];

			//image
			if(isset($_FILES['image']['name']))
			{
				$cakes_imagetitle = $_FILES['image']['name'];

					if($cakes_imagetitle != "")
					{
						//get last extention
						//explode image name and get the last exten
						$ext = end(explode('.', $cakes_imagetitle));

						//rename
						$cakes_imagetitle = "Cake-Name-".rand(0000,9999).".".$ext;

						//get soruce and destination path
						$source = $_FILES['image']['tmp_name'];
						$destination = "../images/cakes/".$cakes_imagetitle;

						//upload
						$upload = move_uploaded_file($source, $destination);

						if($upload==FALSE) //failed to upload image
						{
							$_SESSION['upload'] = "<div class = 'error'>Failed to upload cake image.</div>";

							header('location:'.SITEURL.'admin/manage-cake.php');
							die();
						}
					}
			}
			else
			{
				$cakes_imagetitle = $cakes_imagetitle;	
			}

			//create query
			$query2 = "UPDATE cakes SET 
			ID_cakes = '$ID_cakes',
			cakes_title = '$cakes_title',
			cakes_description = '$cakes_description',
			cakes_price = $cakes_price,
			cakes_imagetitle = '$cakes_imagetitle'
			WHERE ID_cakes = $ID_cakes
			";

			//execute query
			$result2 = mysqli_query($connect, $query2);

			if($result2==TRUE)
			{
				$_SESSION['update-cake'] = "<div class = 'success'>Cake is updated succesfully.</div>";

				header('location:'.SITEURL.'admin/manage-cake.php');
			}
			else
			{
				$_SESSION['update-cake'] = "<div class = 'error'>Failed to update food. Please try again later.</div>";

				header('location:'.SITEURL.'admin/manage-cake.php');
			}
		}
		?>
	</div>
</div>

<?php
include ('header-footer/footer.php');
?>