<?php
include ('header-footer/header.php');
?>

<div class = "main-content">
	<div class = "wrapper">
		<h1>Add Cake</h1>
		<br>

		<?php
		if(isset($_SESSION['upload']))
		{
			echo $_SESSION['upload'];
			unset($_SESSION['upload']);
		}
		?>

		<form action = "" method = "POST" enctype="multipart/form-data"> <!--allow file to get through POST method-->
			<table class = "table-admin">
				<tr>
					<td>Cake Name: </td>
					<td>
						<input type = "text" name = "cakes_title" placeholder="Cake Name">
					</td>
				</tr>

				<tr>
					<td>Description: </td>
					<td>
						<textarea name = "cakes_description" placeholder="Cake Description" cols = "22" rows = "5"></textarea>
					</td>
				</tr>

				<tr>
					<td>Price: </td>
					<td>
						<input type = "number" name = "cakes_price">
					</td>
				</tr>

				<tr>
					<td>Cake Image:</td>
					<td>
						<input type = "file" name = "image">
					</td>
				</tr>

				<tr>
					<td colspan = "2">
						<input type = "submit" name = "submit" value = "Add Cake" class = "btn-secondary">
					</td>
				</tr>
			</table>
		</form>

		<?php
			if(isset($_POST['submit']))
			{
				//get data from form
				$cakes_title = $_POST['cakes_title'];
				$cakes_description = $_POST['cakes_description'];
				$cakes_price = $_POST['cakes_price'];

				//upload image from file
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

							header('location:'.SITEURL.'admin/add-cake.php');
							die();
						}
					}
				}
				else
				{
					$cakes_imagetitle = "";
				}

				//create query
				$query = "INSERT INTO cakes SET 
				cakes_title = '$cakes_title',
				cakes_description = '$cakes_description',
				cakes_price = $cakes_price,
				cakes_imagetitle = '$cakes_imagetitle'
				";

				//execute
				$result = mysqli_query($connect, $query);

				if($result==TRUE)
				{
					$_SESSION['add-cake'] = "<div class = 'success'>Cake is added succesfully.</div>";

					header('location:'.SITEURL.'admin/manage-cake.php');
				}
				else 
				{
					$_SESSION['add-cake'] = "<div class = 'error'>Failed to add cake..</div>";

					header('location:'.SITEURL.'admin/manage-cake.php');
				}
			}
		?>
	</div>
</div>

<?php
include ('header-footer/footer.php');
?>