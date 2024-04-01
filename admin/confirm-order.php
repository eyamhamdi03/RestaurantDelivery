<?php
// confirm_order.php

$db = new PDO('mysql:host=localhost;dbname=RestaurantDelivery', 'root', '');

if (isset($_POST['orderId'])) {
    $orderId = $_POST['orderId'];

    $stmt = $db->prepare("UPDATE userorder SET confirmed = 1 WHERE id = :orderId");
    $stmt->bindParam(':orderId', $orderId);
    $stmt->execute();
}
?>
