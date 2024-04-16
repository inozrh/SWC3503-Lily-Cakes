<?php 
include('header-footer/header.php');
?>

<?php 
//get ID_cakes
if(isset($_GET['ID_cakes']))
{
    $ID_cakes = $_GET['ID_cakes'];

    //get data of selected cake
    //create query
    $query = "SELECT * FROM cakes WHERE ID_cakes = $ID_cakes";

    //execute
    $result = mysqli_query($connect, $query);

    //count
    $count = mysqli_num_rows($result);

    if($count == 1)
    {
        $row = mysqli_fetch_assoc($result);
        $cakes_title = $row['cakes_title'];
        $cakes_price = $row['cakes_price'];
        $cakes_imagetitle = $row['cakes_imagetitle'];
    }
    else
    {
        header('location:'.SITEURL);
    }
}
else
{
    header('location:'.SITEURL);
}
?>
    
    <!-- Order form -->
    <section class="cake-search">
        <div class="container2">
            
            <h2 class="text-center">Fill in the form to confirm order.</h2>

            <form action="<?php echo SITEURL; ?>receipt.php" method = "POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="cake-menu-img">
                        <?php
                        if($cakes_imagetitle == "")
                            {
                                echo "<div class = 'error'>No cake image is added.</div>";
                            }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/cakes/<?php echo $cakes_imagetitle; ?>" class="img img-curve">
                            <?php
                        }
                        ?>
                    </div>
    
                    <div class="cake-menu-desc">
                        <h3><?php echo $cakes_title; ?></h3>
                        <input type = "hidden" name = "cakes_title" value = "<?php echo $cakes_title; ?>">

                        <p class="cake-price">RM <?php echo $cakes_price; ?></p>
                        <input type = "hidden" name = "cakes_price" value = "<?php echo $cakes_price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="quantity" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="cust_name" placeholder="Example : Nurina Zahirah" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="cust_notel" placeholder="Example : 011-16374480" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="cust_address" rows="10" placeholder="Example : Nama Taman, Daerah, Poskod, Negeri | | No 10, Jalan Sama Gagah 18, Taman Teluk Gedung Indah, 42000 Pelabuhan Klang, Selangor" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            

        </div>
    </section>

<?php 
include('header-footer/footer.php');
?>