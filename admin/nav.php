<!-- nav.html -->
<link rel="stylesheet" type="text/css" href="../styles.css">
<?php
define('SITEURL', 'http://localhost/RestaurantDelivery/admin/'); // Adjust the URL as needed
session_start(); 
include('logincheck.php');

?>


<nav id="navigation">
    <div class="restaurant-name">Restaurant Name</div>
    <div class="menu-items">
        <a href="homeAdmin.php" id="home">Home</a>
        <a href="ManageAdmin.php" id="home">Admin</a>
        <a href="OrdersAdmin.php">Orders</a>
        <a href="logout.php">Logout</a>        
    </div>
</nav>
