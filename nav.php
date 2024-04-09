<!-- nav.php -->
<?php
session_start();
?>
<link rel="stylesheet" type="text/css" href="styles.css">
<nav id="navigation">
    <div class="restaurant-name">Wamya</div>
    <div class="menu-items">
        <a href="homeNormal.php" id="home">Home</a>
        <a href="Orders.php" id="orders">Your Orders</a>
        <a href="get-in-touch.php" id="contact">Contact Us</a>
        <a href="<?php echo isset($_SESSION['loggedIn']) ? 'logout.php' : 'login.php'; ?>" id="login">
            <?php echo isset($_SESSION['loggedIn']) ? 'Logout' : 'Login'; ?>
        </a>
    </div>
</nav>

<script>
    window.addEventListener('load', function() {
        var isLoggedIn = <?php echo isset($_SESSION['loggedIn']) ? 'true' : 'false'; ?>;
        var loginButton = document.getElementById('login');
        var ordersButton = document.getElementById('orders');

        if (isLoggedIn) {
            ordersButton.style.pointerEvents = 'auto'; 
            ordersButton.style.color = ''; 
        } else {
            ordersButton.style.pointerEvents = 'none'; 
            ordersButton.style.color = 'rgb(101, 98, 98)'; 
        }
    });
</script>
