<?php
define('SITEURL', 'http://localhost/RestaurantDelivery/admin/'); // Adjust the URL as needed
// destroy the session
session_destroy();
unset($_SESSION['user']);
header('Location: login.php');
?>