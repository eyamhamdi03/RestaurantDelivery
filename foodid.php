<?php
if(isset($_GET['foodid'])) {
    $id = $_GET['foodid'];
} else {
    echo "<script>alert('Food ID not provided. Redirecting to homepage.'); window.location.href = 'homeNormal.php';</script>";
    exit();
}
?>