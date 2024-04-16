<?php
include ('constant/constant.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lily's Cake Website</title>

    <!-- Link to CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>" title="Logo">
                    <img src="images/lilyslogo2.jpg" alt="Lily's Cakes Logo" class="img">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home Page</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>cakes.php">Cakes</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>about-us.php">About Us</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>admin/login.php">Admin</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section> 