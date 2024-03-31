<?php include('foodid.php');?>
<!DOCTYPE html>
<html style="height: 100vh; overflow-y: auto;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="order.css">
    <title>Order</title>
</head>
<body>
    <?php include ('nav.php');?>

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
        <div class="titre">Address details</div>
        <div class="layout">
            <div class="name">
                <span class="typo">Street Address :</span><br>
                <input class="inpu" type="text" name="Street" size="15" maxlength="30" required> <br><br>
            </div>
            <div class="name">
                <span class="typo"> Apt/Suite/Other:</span><br>
                <input class="inpu" type="text" name="Apt" size="15" maxlength="30" required> <br><br>
            </div>
        </div>
        <div class="layout">
            <div class="name">
                <span class="typo">State/City</span><br>
                <input class="inpu" type="text" name="State" size="15" maxlength="30" required> <br><br>
            </div>
            <div class="name">
                <span class="typo"> Code Postal:</span><br>
                <input class="inpu" type="text" name="code" size="15" maxlength="30" required> <br><br>
            </div>
        </div>
    </div>
    <div id="frame2">
        <div class="titre">Delivery Options</div>
        <div class="box">
            <input type="checkbox" class="check">
            <div class="Standard">Standard Delivery</div>
            <div class="time">(1hour,2DT)</div>
        </div>
        <div class="box">
            <input type="checkbox" class="check">
            <div class="Standard">Fast Delivery</div>
            <div class="time">30min(4DT)</div>
        </div>
    </div>
    <input type="submit" href="payment.php?foodid=<?php echo $id ?>" value="Next Step">
    </div>
    </div>
    <div id="photo2"></div>
</body>
</html>

