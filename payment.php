<?php
if(isset($_GET['foodid'])) {
  $foodid= $_GET['foodid'];
} else {
    echo "<script>alert('Food ID not provided. Redirecting to homepage.'); window.location.href = 'homeNormal.php';</script>";
    exit();
}

$price=0;
// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=RestaurantDelivery', 'root', '');

if ($foodid) {
    // Query to get the dishPrice based on the foodid
    $stmt = $db->prepare("SELECT dishPrice FROM menu WHERE dishId = ?");
    if ($stmt) {
        // Bind the parameter
        $stmt->bindParam(1, $foodid, PDO::PARAM_INT);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Fetch the result
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $price = $row['dishPrice'];
            } else {
                $price = 'Not found'; // Set a default value if the foodid is not found
            }
        } else {
            $errorInfo = $stmt->errorInfo();
            $price = 'Error: ' . $errorInfo[2];
        }
    } else {
        $errorInfo = $db->errorInfo();
        $price = 'Error: ' . $errorInfo[2];
    }
    echo $price;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title id="head">Payment</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="payment.css">

</head>
<body>
    <?php include('nav.php'); ?>
    <?php include('steps.php');?>
    <div id="photo"></div>
    <div class="frame">
        <div id="titre">Paiement</div>
        <div id="group">
            <div class="layout">
                <span class="details">Order:</span>
                <span class="flous" id="order"><?php echo $price; ?>.00 Dt</span>
            </div>
            <div class="layout">
                <span class="details">Discount:</span>
                <span class="flous" id="Discount">00.00 Dt</span>
            </div>
            <div class="layout">
                <span class="details">Delivery:</span>
                <span class="flous" id="Delivery">2.00 Dt</span>
            </div>
            <div class="layout">
                <span id="Total">Total:</span>
                <span class="flous" id="total"></span>
            </div>
            <div class="flous">Le paiement sera effectué à la livraison</div>
        </div>
    </div>
    </div>
    
    <input type="submit"value="Next Step" onclick="window.location.href='step3.php?foodid=<?php echo $id ?>';">
    <div id="photo2"></div>
    <script src="payment.js"></script>
</body>
</html>
