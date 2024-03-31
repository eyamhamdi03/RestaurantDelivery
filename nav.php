<!-- nav.html -->
<link rel="stylesheet" type="text/css" href="styles.css">

<nav id="navigation">
    <div class="restaurant-name">Restaurant Name</div>
    <div class="menu-items">
        <a href="home.php" id="home">Home</a>
        <a href="Orders.php" id="orders" style=" pointer-events: none; color: rgb(101, 98, 98); text-decoration: none;">Your Orders</a>
        <a href="get-in-touch.php" id="contact">Contact Us</a>
        <a href="login.php" id="login">Login</a>
    </div>
</nav>

<script>
    window.addEventListener('load', function() {
        var isLoggedIn = /* Your logic to check if the user is logged in */;
        var loginButton = document.getElementById('login');
        var ordersButton = document.getElementById('orders');

        if (isLoggedIn) {
            loginButton.innerText = 'Logout';
            loginButton.href = 'logout.php'; // Change the href to the logout page
            ordersButton.style.pointerEvents = 'auto'; // Enable the Orders button
            ordersButton.style.color = ''; // Reset the color
        } else {
            loginButton.innerText = 'Login';
            loginButton.href = 'login.php'; // Change the href back to the login page
            ordersButton.style.pointerEvents = 'none'; // Disable the Orders button
            ordersButton.style.color = 'rgb(101, 98, 98)'; // Set the color back to gray
        }
    });
</script>
