<?php
include("connection.php");
// Check if user is already logged in
if (isset($_SESSION['loggedIn'])) {
    echo "<div style='color:red;'>You are already logged in.</div>";
    echo "<script>
            setTimeout(function() {
                window.location.href = 'homeNormal.php';
            }, 1000); 
          </script>";
    exit();
}
?>
