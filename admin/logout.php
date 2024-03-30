<?php
session_start();
define('SITEURL', 'http://localhost/RestaurantDelivery/admin/'); // Adjust the URL as needed

// Check if the session variable is set
if (isset($_SESSION['user'])) {
    // Destroy the session
    session_destroy();
    // Unset the session variable
    unset($_SESSION['user']);
    // Redirect to login page
    header('Location: login.php');
    exit; // Exit to prevent further execution
} else {
    // Redirect to login page if session variable is not set
    header('Location: login.php');
    exit; // Exit to prevent further execution
}
?>
