<?php 
include('header-footer/header.php');
?>

    <!-- Search Bar -->
    <section class="cake-search text-center">
        <div class="container">
            <?php
            $search = $_POST['search'];
            ?>
            <h2>Cake you're searching for : <a href="<?php echo SITEURL; ?>cakes.php" class="text-white"><?php echo $search; ?></a></h2>

        </div>
    </section>

<!-- Cake details -->
    <section class="cake-menu">
        <div class="container">
            <h2 class="text-center">Cakes</h2>

            <!--get search-cake.php-->
            <?php

            //create query
            $query = "SELECT * FROM cakes WHERE cakes_title LIKE '%$search%'";

            //execute
            $result = mysqli_query($connect, $query);

            $count = mysqli_num_rows($result);

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($result))
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
                            if($cakes_imagetitle=="")
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

                            <a href="order.php" class="btn btn-primary">Order Now!</a>
                        </div>
                    </div>
                    <?php
                }
            }
            else
            {
                echo "<div class = 'error'>Sorry $search isn't avalaible. Please try again.</div>";
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