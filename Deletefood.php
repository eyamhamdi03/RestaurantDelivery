<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = new PDO('mysql:host=localhost;dbname=RestaurantDelivery', 'root', '');
    $sql = "DELETE FROM menu WHERE dishId = $id";
    $db->exec($sql);
    echo "Processing your deletion request...";
    echo '<meta http-equiv="refresh" content="10;url=homeAdmin.php">';
    exit();
} else {
    echo "Access Denied";
}
?>
