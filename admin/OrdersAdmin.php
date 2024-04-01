<!DOCTYPE html>
<html lang="en" style="overflow-y: auto; ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="../Styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
                <div class="row" id="OrdersRow">
                <?php
$db = new PDO('mysql:host=localhost;dbname=RestaurantDelivery', 'root', '');
$sql = "SELECT uo.id, uo.foodid, uo.date_added AS date, uo.total, uo.delivery_option, uo.confirmed, m.dishName AS food_name
        FROM userorder uo
        JOIN menu m ON uo.foodid = m.dishId
        ORDER BY uo.confirmed ASC, uo.date_added DESC";

$stmt = $db->query($sql);

// Loop through each order and display it
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id'];
    $foodName = $row['food_name'];
    $date = $row['date'];
    $total = $row['total'];
    $deliveryOption = $row['delivery_option'];
    $confirmed = $row['confirmed'] ? 'Confirmed' : 'Not Confirmed';

    echo "<div class='col'>
            <div class='card-wrapper'>
                <div class='card h-100'>
                    <div class='card-body'>
                        <div class='card-overlay'>
                            <span class='" . ($row['confirmed'] ? 'delivered' : 'waiting') . "'>" . ($row['confirmed'] ? 'Confirmed' : 'Not Confirmed') . "</span>
                        </div>
                        <h5 class='card-title' style='margin-top: 10px; margin-bottom: 10px;'>$foodName</h5>
                        <div class='delivery-option'>Delivery Option: $deliveryOption</div><br>
                        <div class='d-flex justify-content-between align-items-center flex-grow-1' style='margin-bottom: 30px;'>
                            <div class='price'>$total DT</div>
                            <span class='date'>$date</span>
                        </div>
                        " . (!$row['confirmed'] ? "<button class='btn btn-success mt-auto' onclick='confirmOrder($id)'>Confirm Order</button>" : '') . "
                    </div>
                </div>
            </div>
        </div>";
}
?>
<script>
    function confirmOrder(orderId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'confirm-order.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                window.location.reload();
            }
        };
        xhr.send('orderId=' + orderId);
    }
</script>


                </div>
            </div>
        </div>
    </div>
</body>
</html>
