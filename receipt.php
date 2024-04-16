<?php 
include('header-footer/header2.php');
?>

<?php
            if(isset($_POST['submit']))
            {
                //get data from form
                $cake = $_POST['cakes_title'];
                $price = $_POST['cakes_price'];
                $qty = $_POST['quantity'];
                $total_price = $price * $qty;
                $status = "Ordered";
                $cust_name = $_POST['cust_name'];
                $cust_notel = $_POST['cust_notel'];
                $cust_address = $_POST['cust_address'];

                //create query
                $query = "INSERT INTO table_order SET
                cake = '$cake',
                price = $price,
                qty = $qty,
                total_price = $total_price,
                status = '$status',
                cust_name = '$cust_name',
                cust_notel = '$cust_notel',
                cust_address = '$cust_address'
                ";

                //execute
                $result = mysqli_query($connect, $query);
            }
            ?>
            

            <div class="receipt">
			  <header class="receipt__header">
			    <p class="receipt__title">
			      Your Receipt
			    </p>
			  </header>
			  <dl class="receipt__list">
			  	<div class="receipt__list-row receipt__list-row--total">
			      <dt class="receipt__item">Cake</dt>
			    </div>
			    <div class="receipt__list-row">
			      <dt class="receipt__item">Cake</dt>
			      <dd class="receipt__cost"><?php echo $cake; ?></dd>
			    </div>
			    <div class="receipt__list-row">
			      <dt class="receipt__item">Price</dt>
			      <dd class="receipt__cost"><?php echo $price; ?></dd>
			    </div>
			    <div class="receipt__list-row">
			      <dt class="receipt__item">Quantity</dt>
			      <dd class="receipt__cost"><?php echo $qty; ?></dd>
			    </div>
			    <div class="receipt__list-row receipt__list-row--total">
			      <dt class="receipt__item">Customer</dt>
			    </div>
			    <div class="receipt__list-row ">
			      <dt class="receipt__item">Customer Name</dt>
			      <dd class="receipt__cost"><?php echo $cust_name; ?></dd>
			    </div>
			    <div class="receipt__list-row">
			      <dt class="receipt__item">NoTel</dt>
			      <dd class="receipt__cost"><?php echo $cust_notel; ?></dd>
			    </div>
			    <div class="receipt__list-row">
			      <dt class="receipt__item">Address</dt>
			      <dd class="receipt__cost"><?php echo $cust_address; ?></dd>
			    </div>
			    <div class="receipt__list-row receipt__list-row--total">
			      <dt class="receipt__item">Total Price </dt>
			      <dd class="receipt__cost">RM <?php echo $total_price; ?></dd>
			    </div>
			     <div class="receipt__list-row--total">

			     	<div class = "text text-center">Thank you for ordering!</div>

			     	<div class = "text text-center">Your delivery is on the way.🚗</div>

			     	<br>
			     <div class = "text-center">
			    <a href="<?php echo SITEURL; ?>">
			        Back to Home Page
			    </a>
			</div>
			  </dl>
			  </div>
</div>

<?php 
include('header-footer/footer2.php');
?>