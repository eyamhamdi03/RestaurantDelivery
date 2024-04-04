<?php
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    $_SESSION['login-message'] = "<div style='color: red;'>Please login to access Orders.</div>";
    echo $_SESSION['login-message'];
    echo "<script>
        setTimeout(function() {
            window.location.href = 'login.php';
        }, 1000); 
    </script>";
    exit; 
}
$userId = $_SESSION['id'];

?>
