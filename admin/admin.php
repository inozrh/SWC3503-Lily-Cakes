<?php
include ('header-footer/header.php');
?>

	<!--Main Content Section-->
    <div class = "main-content">
    	<div class = "wrapper">
    	<h1>Admin Panel</h1>

        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];//display message
            unset($_SESSION['add']);//remove message
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];//display message
            unset($_SESSION['delete']);//remove message
        }

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];//display message
            unset($_SESSION['update']);//remove message
        }

        if(isset($_SESSION['no-user']))
        {
            echo $_SESSION['no-user'];//display message
            unset($_SESSION['no-user']);//remove message
        }

        if(isset($_SESSION['not-match']))
        {
            echo $_SESSION['not-match'];//display message
            unset($_SESSION['not-match']);//remove message
        }

        if(isset($_SESSION['update-password']))
        {
            echo $_SESSION['update-password'];//display message
            unset($_SESSION['update-password']);//remove message
        }
        ?>
        <br>

        <!--Add Admin Button-->
        <a href = "add-admin.php" class = "btn-primary">Add Admin</a>
        <br>
        <br>

            <table class ="table-width">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Action</th>
            </tr>

            <?php
            //get query from admin
            $query = "SELECT * FROM admin";

            //execute query
            $result = mysqli_query($connect, $query);

            //check query
            if($result==TRUE)
            {
                //check rows
                $count = mysqli_num_rows($result);

                $no = 1;

                if($count > 0)
                {
                    //data is in database
                    while($rows=mysqli_fetch_assoc($result))
                    {
                        //get all data

                        //get individual data
                        $ID = $rows['ID'];
                        $admin_username = $rows['admin_username'];
                        $admin_fullname = $rows['admin_fullname'];

                        //display data
                        ?>


                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $admin_username; ?></td>
                            <td><?php echo $admin_fullname; ?></td>
                            <td>
                                <a href = "<?php echo SITEURL; ?>admin/update-admin.php?ID=<?php echo $ID; ?>" class = "btn-secondary">Update</a>
                                <a href = "<?php echo SITEURL; ?>admin/delete-admin.php?ID=<?php echo $ID; ?>" class = "btn-third">Delete</a>
                                <a href = "<?php echo SITEURL; ?>admin/password.php?ID=<?php echo $ID; ?>" class = "btn-primary">Update Password</a>
                            </td>
                        </tr>

                        <?php

                    }
                }
                else
                {
                    //no data in database
                }
            }
            ?>
        </table>
    	
    	
        </div>
    </div>
	<!--Main Content Section-->
<?php
include ('header-footer/footer.php');
?>