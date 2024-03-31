<!DOCTYPE html>
<html lang="en" style="overflow-y: auto; ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="Styles.css">
    <script src="Script.js" defer></script>
    <script src="scriptOrders.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body >
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1529 848" fill="none" class="svg-background">
        <g filter="url(#filter0_d_3_4691)">
            <path d="M1528.62 0V781C1394.57 846.2 1270.91 636 1043.41 699.5C1043.41 699.5 751.759 781 621.84 590C621.84 590 514.722 415 285.64 548C285.64 548 93.1469 619 -0.182983 498V0H1528.62Z" fill="white"/>
        </g>
    </svg>

    <!-- nav.html -->
    <?php include ('nav.php');?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="FoodDelivery" style="text-align: left; margin-top: 100px;">
                    <span style="color: #DC2F02; font-size: 80px; font-family: Poppins; font-weight: 700; text-transform: capitalize; line-height: 86px; word-wrap: break-word ; ">Food</span>
                    <span style="color: #370617; font-size: 80px; font-family: Poppins; font-weight: 700; text-transform: capitalize; line-height: 86px; word-wrap: break-word"><br/>Delivery</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="Title" id="Orders" style="text-align: left; margin-top: 40px;">Orders</div>
                <div class="row" id="OrdersRow"></div>
            </div>
        </div>
    </div>

</body>
</html>
