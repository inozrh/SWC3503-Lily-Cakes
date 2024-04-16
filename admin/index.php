<?php
include ('header-footer/header.php');
?>

	<!--main content section-->
    <div class = "main-content">
    	<div class = "wrapper">
    	<h1>DASHBOARD</h1>
    	<br>

        <?php 
        if(isset($_SESSION['login']))//if login succesful
        {
            echo $_SESSION['login'];//display message
            unset($_SESSION['login']);//remove message
        }
        ?>

    	<div class = "col-4 text-center">
            <?php 
            //create query
            $query = "SELECT * FROM cakes";

            //execute
            $result = mysqli_query($connect, $query);

            $count = mysqli_num_rows($result);
            ?>

    		<h1><?php echo $count; ?></h1>
            <br>
    		Cakes
    	</div>

    	<div class = "col-4 text-center">
            <?php 
            //create query
            $query2 = "SELECT * FROM table_order";

            //execute
            $result2 = mysqli_query($connect, $query2);

            $count2 = mysqli_num_rows($result2);
            ?>

    		<h1><?php echo $count2; ?></h1>
            <br>
    		Order
    	</div>

    	<div class = "col-4 text-center">
            <?php
            //create query
            $query3 = "SELECT SUM(total_price) AS Profit FROM table_order WHERE status = 'Delivered'";

            //execute 
            $result3 = mysqli_query($connect, $query3);

            //get total_price
            $row3 = mysqli_fetch_assoc($result3);

            //get total profit
            $profit = $row3['Profit'];
            ?>

    		<h1>RM <?php echo $profit; ?></h1>
            <br>
    		Profit
    	</div>

    	<div class = "clearfix"></div>
    	
        </div>
    </div>
	<!--main content section-->

<?php
include ('header-footer/footer.php');
?>
