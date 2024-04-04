<?php
session_start();

// Check if the session variables are set
if (isset($_SESSION['id'])) { 
    session_destroy();
    unset($_SESSION['id']);
    // Redirect to login page
    header('Location: login.php');
    exit; // Exit to prevent further execution
} else {
    // Redirect to login page if session variables are not set
    header('Location: login.php');
    exit; // Exit to prevent further execution
}
?>

