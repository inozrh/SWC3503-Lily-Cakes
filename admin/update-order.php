<?php
include ('header-footer/header.php');
?>

<div class = "main-content">
	<div class = "wrapper">
		<h1>Update Order</h1>
		<br>

		<?php
		//create query
		if(isset($_GET['ID_order']))
		{
			$ID_order = $_GET['ID_order'];

			//create query
			$query = "SELECT * FROM table_order WHERE ID_order = $ID_order";

			//execute
			$result = mysqli_query($connect, $query);

			$count = mysqli_num_rows($result);

			if($count==1)
			{
				$row = mysqli_fetch_assoc($result);

				$cake = $row['cake'];
                $qty = $row['qty'];
                $price = $row['price'];
                $status = $row['status'];
                $cust_name = $row['cust_name'];
                $cust_notel = $row['cust_notel'];
                $cust_address = $row['cust_address'];
			}
			else
			{
				header('location:'.SITEURL.'admin/manage-order.php');
			}
		}
		else
		{
			header('location:'.SITEURL.'admin/manage-order.php');
		}
		?>

		<form action = "" method = "POST">
			<table class = "table-admin">

				<tr>
					<td>Cake: </td>
					<td><strong><?php echo $cake; ?></strong></td>
				</tr>

				<tr>
					<td>Customer Name: </td>
					<td><?php echo $cust_name; ?></td>
				</tr>

				<tr>
					<td>No Tel: </td>
					<td><?php echo $cust_notel; ?></td>
				</tr>

				<tr>
					<td>Address: </td>
					<td>
						<textarea name = "cust_address" cols = "22" rows = "5"><?php echo $cust_address; ?></textarea>
					</td>
				</tr>

				<tr>
					<td>Price: </td>
					<td>RM <?php echo $price; ?></td>
				</tr>

				<tr>
					<td>Quantity: </td>
					<td>
						<input type ="number" name = "qty" value = "<?php echo $qty; ?>">
					</td>
				</tr>

				<tr>
					<td>Status: </td>
					<td>
						<select name ="status">
							<option <?php if($status=="Ordered"){echo "selected";} ?> value = "Ordered">Ordered</option>
							<option <?php if($status=="On Delivery"){echo "selected";} ?> value = "On Delivery">On Delivery</option>
							<option <?php if($status=="Delivered"){echo "selected";} ?> value = "Delivered">Delivered</option>
							<option <?php if($status=="Cancelled"){echo "selected";} ?> value = "Cancelled">Cancelled</option>
					</td>
				</tr>

				<tr>
					<td colspan = "2">
						<input type = "hidden" name = "ID_order" value = "<?php echo $ID_order; ?>">
						<input type = "hidden" name = "price" value = "<?php echo $price; ?>">
						<input type = "submit" name = "submit" value = "Update Order" class = "btn-secondary">
					</td>
				</tr>

			</table>
		</form>

		<?php
		if(isset($_POST['submit']))
		{
			//get data from form
			$ID_order = $_POST['ID_order'];
			$price = $_POST['price'];
			$qty = $_POST['qty'];
			$status = $_POST['status'];
			$cust_name = $_POST['cust_name'];
			$cust_notel = $_POST['cust_notel'];
			$cust_address = $_POST['cust_address'];
			$total_price = $price * $qty;

			//create query
			$query2 = "UPDATE table_order SET 
			cust_address = '$cust_address',
			qty = $qty,
			total_price = $total_price,
			status = '$status'
			WHERE ID_order = $ID_order
			";

			//execute
			$result2 = mysqli_query($connect, $query2);

			if($result2==TRUE)
			{
				$_SESSION['update-order'] = "<div class = 'success'>Order is updated succesfully.</div>";

				header('location:'.SITEURL.'admin/manage-order.php');
			}
			else 
			{
				$_SESSION['update-order'] = "<div class = 'error'>Failed to update order. Please try again.</div>";

				header('location:'.SITEURL.'admin/manage-order.php');
			}

			//redirect to manage-order.php
		}
		?>
	</div>
</div>

<?php
include ('header-footer/footer.php');
?>