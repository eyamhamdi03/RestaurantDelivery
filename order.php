

<!DOCTYPE html>
<html style="height: 100vh; overflow-y: auto;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="order.css">

    <title>Order</title>
</head>
<body>
    <?php include ('nav.php');?>
    <?php include('steps.php');?>
    <div id="photo"></div>
    <form action="" method="POST">
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
                <input class="inpu" type="number" name="code" size="15" maxlength="30" required> <br><br>
            </div>
        </div>
    </div>
    <div id="frame2">
  <div class="titre">Delivery Options</div>
  <div class="box">
    <input type="radio" name="delivery" class="check" value="standard">
    <div class="Standard">Standard Delivery</div>
    <div class="time">(1 hour, 2 DT)</div>
  </div>
  <div class="box">
    <input type="radio" name="delivery" class="check" value="fast">
    <div class="Standard">Fast Delivery</div>
    <div class="time">(30 min, 4 DT)</div>
  </div>
</div>
<input type="submit" name="submit" value="Next Step"> 

    </div>
    </form>
    </div>
    <div id="photo2"></div>
</body>
</html>
