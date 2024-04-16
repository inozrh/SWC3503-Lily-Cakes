<?php
include ('header-footer/header.php');
?>

<div class = "main-content">
	<div class = "wrapper">
		<h1>Manage Cake</h1>
		<br>

		<!--Add Admin Button-->
        <a href = "<?php echo SITEURL; ?>admin/add-cake.php" class = "btn-primary">Add Cake</a>
        <br>
        <br>

        <?php
        if(isset($_SESSION['add-cake']))
        {
            echo $_SESSION['add-cake'];
            unset($_SESSION['add-cake']);
        }

        if(isset($_SESSION['delete-cake']))
        {
            echo $_SESSION['delete-cake'];
            unset($_SESSION['delete-cake']);
        }
        if(isset($_SESSION['update-cake']))
        {
            echo $_SESSION['update-cake'];
            unset($_SESSION['update-cake']);
        }
        ?>

		<table class ="table-width">
            <tr>
                <th>No</th>
                <th>Cake</th>
                <th>Price</th>
                <th>Cake Image</th>
                <th>Action</th>
            </tr>

            <?php
            //create query
            $query = "SELECT * FROM cakes";

            //execute
            $result = mysqli_query($connect, $query);

            $count = mysqli_num_rows($result);

            $no=1;

            if($count>0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $ID_cakes = $row['ID_cakes'];
                    $cakes_title = $row['cakes_title'];
                    $cakes_price = $row['cakes_price'];
                    $cakes_imagetitle = $row['cakes_imagetitle'];
                    ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $cakes_title; ?></td>
                        <td>RM <?php echo $cakes_price; ?></td>
                        <td>
                            <?php  
                            if($cakes_imagetitle=="")
                            {
                                echo "<div class = 'error'>No cake image is added.</div>";
                            }
                            else
                            {
                                ?>
                                <img src = "<?php echo SITEURL; ?>images/cakes/<?php echo $cakes_imagetitle; ?>" width = "150px">
                                <?php

                            }
                            ?>
                        </td>
                        <td>
                            <a href = "<?php echo SITEURL; ?>admin/update-cake.php?ID_cakes=<?php echo $ID_cakes;?>" class = "btn-secondary">Update</a>
                            <a href = "<?php echo SITEURL; ?>admin/delete-cake.php?ID_cakes=<?php echo $ID_cakes; ?>&cakes_imagetitle=<?php echo $cakes_imagetitle; ?>" class = "btn-third">Delete</a>
                        </td>
                    </tr>

                    <?php
                }
            }
            else
            {
                echo "<tr><td colspan = '7' class = 'error'>No cake in database.</td></tr>";
            }
            ?>
        </table>

	</div>
</div>

<?php
include ('header-footer/footer.php');
?>