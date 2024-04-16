<?php
//include constant.php
include('../constant/constant.php');

//destroy session
session_destroy();

//redirect to login.php
header('location:'.SITEURL.'admin/login.php');
?>