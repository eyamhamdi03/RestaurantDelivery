<?php
if(isset($_GET['foodid'])) {
    $foodid = $_GET['foodid'];
} else {
    echo "<script>alert('Food ID not provided. Redirecting to homepage.'); window.location.href = 'homeNormal.php';</script>";
    exit();
}
include ('logincheck.php');
include("connection.php");
if(isset($_POST['submit'])){
    $street_address = $_POST['Street'];
    $Apt = $_POST['Apt'];
    $State = $_POST['State'];
    $code = $_POST['code'];
    $delivery = $_POST['delivery'];
    $deliveryfees = ($delivery == 'standard') ? 2 : 4;

    $dishPrice = 0;
    $sql = "SELECT * FROM menu WHERE dishId = '$foodid'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $dishPrice += $row['dishPrice'];
        }
    }
    $total = $dishPrice + $deliveryfees;

    $customerid = $_SESSION['id']; 

    // Insert order into database
    $sql = "INSERT INTO userorder (`customerid`,`foodid`, `street_address`, `Apt_suite_other`, `state_city`, `Code_postal`, `delivery_option`, `total`) VALUES ('$customerid','$foodid', '$street_address', '$Apt', '$State', '$code', '$delivery', '$total')";
    if (mysqli_query($conn, $sql)) {
    // Redirect to payment page after successful insertion
    header("Location: payment.php?foodid=" . $foodid . "&dishPrice=" . $dishPrice . "&deliveryfees=" . $deliveryfees . "&total=" . $total);
    exit; // Terminate script execution
    } else {
    // Display error message if insertion fails
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
?>

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
