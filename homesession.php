<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include("homeNormal.php");
} else {
    header('Location: login.php');
    exit();
}
?>