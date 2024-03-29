<?php
$db = new PDO('mysql:host=localhost;dbname=RestaurantDelivery', 'root', '');

$stmt = $db->query('SELECT * FROM menu');
$menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($menuItems);
?>

