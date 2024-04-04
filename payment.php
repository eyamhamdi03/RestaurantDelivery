<?php

include ('logincheck.php');

if (!isset($_GET['dishPrice']) || !isset($_GET['deliveryfees']) || !isset($_GET['total'])) {
    $_SESSION['message'] = "Please choose an item to order first.";
    header("Location: homeNormal.php");
    exit; 
}

$dishPrice = $_GET['dishPrice'];
$deliveryfees = $_GET['deliveryfees'];
$total = $_GET['total'];


?>
<!DOCTYPE html>
<html>
<head>
    <title id="head">Payment</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="payment.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.min.css">
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
                <span class="flous" id="order"><?php echo $dishPrice; ?>.00 Dt</span>
            </div>
            <div class="layout">
                <span class="details">Discount:</span>
                <span class="flous" id="Discount">00.00 Dt</span>
            </div>
            <div class="layout">
                <span class="details">Delivery:</span>
                <span class="flous" id="Delivery"><?php echo $deliveryfees ?>.00 Dt</span>
            </div>
            <div class="layout">
                <span id="Total">Total:</span>
                <span class="flous" id="total"><?php echo $total?>.00 Dt</span>
            </div>
            <div class="layout">
            <div class="flous">Le paiement sera effectué à la livraison</div>
            </div>
            <div class="layout" style="align-items:center;">
            <a href="step3.php" class="FillBtn btn" style="margin-top:50px; margin-left:70px;">Next Step</a>
            </div>
        </div>
    </div>
    
    <div id="photo2"></div>
</body>
</html>
