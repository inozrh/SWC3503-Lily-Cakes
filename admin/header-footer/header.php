<?php
include ('../constant/constant.php');
?>

<html>
<head>
	<title>Lily's Cakes Website</title>

	<link rel="stylesheet" href="../css/admin.css">
</head>

<body>

	<!--navbar section-->
    <div class = "menu">
        <div class="logo">
                <a href="<?php echo SITEURL; ?>admin" title="Logo">
                    <img src="../images/lilyslogo2.jpg" alt="Lily's Cakes Logo" class="img" width = "170px">
                </a>
            </div>
    	<div class = "wrapper">
    	<ul>
    		<li><a href = "index.php">Home</a></li>
    		<li><a href = "admin.php">Admin Panel</a></li>
    		<li><a href = "manage-cake.php">Cake</a></li>
    		<li><a href = "manage-order.php">Order</a></li>
            <li><a href = "logout.php">Log Out</a></li>
    	</ul>
        </div>
    </div>