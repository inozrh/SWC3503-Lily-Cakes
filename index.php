<?php 
include('header-footer/header.php');
?>

    <!-- Search Bar -->
    <section class="cake-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>search-cake.php" method="POST">
                <input type="search" name="search" placeholder="Search for Cake?" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>

    <!-- Big Images -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Our Cakes!</h2>

            <?php
            //create query
            $query = "SELECT * FROM cakes";

            //execute
            $result = mysqli_query($connect, $query);

            $count = mysqli_num_rows($result);

            if($count>0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $ID_cakes = $row['ID_cakes'];
                    $cakes_title = $row['cakes_title'];
                    $cakes_imagetitle = $row['cakes_imagetitle'];
                    ?>

                    <div class="box-3 float-container">
                    <?php
                    if($cakes_imagetitle == "")
                    {
                        echo "<div class = 'error'>No cake image is added.</div>";
                    }
                    else 
                    {
                        ?>
                        <img src = "<?php echo SITEURL; ?>images/cakes/<?php echo $cakes_imagetitle; ?>" class = "img img-curve">
                        <?php
                    }
                    ?>
                        <h3 class="float-text text-white"><?php echo $cakes_title; ?></h3>
                    </div>
                    <?php
                }
            }
            else
            {
                echo "<div class = 'error'>No cake is available.</div>";
            }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>

    <!-- Cake details -->
    <section class="cake-menu">
        <div class="container">
            <h2 class="text-center">Cakes Description</h2>

            <?php
            //create query
            $query2 = "SELECT * FROM cakes";

            //execute
            $result2 = mysqli_query($connect, $query2);

            $count = mysqli_num_rows($result2); 

            if($count>0)
            {
                while($row = mysqli_fetch_assoc($result2))
                {
                    $ID_cakes = $row['ID_cakes'];
                    $cakes_title = $row['cakes_title'];
                    $cakes_description = $row['cakes_description'];
                    $cakes_price = $row['cakes_price'];
                    $cakes_imagetitle = $row['cakes_imagetitle'];
                    ?>
                    <div class="cake-menu-box">
                        <div class="cake-menu-img">
                            <?php
                            if($cakes_imagetitle == "")
                            {
                                echo "<div class = 'error'>No cake image is added.</div>";
                            }
                            else 
                            {
                                ?>
                                <img src = "<?php echo SITEURL; ?>images/cakes/<?php echo $cakes_imagetitle; ?>" class = "img img-curve">
                                <?php
                            }
                            ?>
                        </div>

                        <div class="cake-menu-desc">
                            <h4><?php echo $cakes_title; ?></h4>
                            <p class="cake-price">RM <?php echo $cakes_price; ?></p>
                            <p class="cake-detail">
                                <?php echo $cakes_description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?ID_cakes=<?php echo $ID_cakes; ?>" class="btn btn-primary">Order Now!</a>
                        </div>
                    </div>
                    <?php
                }
            }
            else 
            {
                echo "<div class = 'error'>No cakes is available.</div>";
            }
            ?>

            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="cakes.php">See All Cakes</a>
        </p>
    </section>

<?php 
include('header-footer/footer.php');
?>