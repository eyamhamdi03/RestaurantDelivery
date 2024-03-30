<?php
// Authorization of access control
if (!(isset($_SESSION['user']))) {
    // Admin is not logged in
    // Set the message and redirect after a delay
    $_SESSION['login-message']="<div class='error text-center' style='color: red;'>Please login to access Admin Panel.</div>";
    echo $_SESSION['login-message']; // Display the message
    echo "<script>
        setTimeout(function() {
            window.location.href = 'login.php';
        }, 1000); 
    </script>";
    exit; // Terminate the script to prevent further execution
}
?>
