<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = new PDO('mysql:host=localhost;dbname=RestaurantDelivery', 'root', '');
    $sql = "DELETE FROM Admins WHERE AdminId = $id";
    $db->exec($sql);
    echo "Processing your deletion request...";
    echo '<meta http-equiv="refresh" content="2;url=ManageAdmin.php">';
    exit();
} else {
    echo "Access Denied";
}
?>
