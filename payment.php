<?php include('foodid.php');?>

<!DOCTYPE html>
<html>
    <head>
        <title id="head">Payment</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="payment.css">
    </head>
    <body>
        <nav id="navigation">
            <div class="restaurant-name">Restaurant Name</div>
            <div class="menu-items">
            <a href="../home.html">Home</a>
            <a href="#" style=" pointer-events: none; color: rgb(101, 98, 98); text-decoration: none;">Your Orders</a>
            <a href="../get-in-touch.html">Contact Us</a>
            <a href="#">Logout</a>
            </div>
        </nav>
        <div class="container">
            <div class="step"> 
                <p>01</p>
                <h4>DELIVERY</h4>
            </div>
            <div class="step"> 
              <p>02</p>
              <h4>PAYMENT</h4>
            </div>
 
       <div class="step active"> 
          <p>03</p>
          <h4>CONFIRM</h4>
        </div>
       </div>
       <div id="photo"></div>
       <div class="frame">
        <div id="titre">Paiement</div>
        <div id="group">
            <div class="layout">
            <span class="details">Order:</span>
            <span class="flous" id="order">12.00 Dt</span></div>
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
    <input type="submit" href="step3.html?foodid=<?php echo $id ?>" value="Next Step">
 </div>
<div id="photo2"></div>
    
    </body>
    <?php
        try {
            $db= new PDO('mysql:host=localhost;dbname=payment', 'root1', '123');
            }
        catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
            die();
            }
        $client_id = 1;
        $sql = "SELECT total_order_amount, total_discount_amount, Delivery_option FROM orders WHERE ID_Client = :client_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':client_id', $client_id);
        $stmt->execute();
        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($order) {
            echo "<script>";
            echo "document.getElementById('order').innerHTML = '{$order['total_order_amount']}.00 Dt';";
            echo "document.getElementById('Discount').innerHTML = '{$order['total_discount_amount']}.00 Dt';";
            echo "document.getElementById('Delivery').innerHTML = '{$order['Delivery_option']}.00 DT';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('None found orders under this ID');";
            echo "</script>";
        }
        ?>
        <script src="payment.js"></script>

</html>
