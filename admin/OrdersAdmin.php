<!DOCTYPE html>
<html lang="en" style="overflow-y: auto; ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="../Styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../node_modules/jspdf/dist/jspdf.umd.min.js"></script>
</head>
<body>
    <?php include ('nav.php');?>

    <?php
    $db = new PDO('mysql:host=localhost;dbname=RestaurantDelivery', 'root', '');
    $sql = "SELECT uo.id, uo.foodid, uo.date_added AS date, uo.total, uo.delivery_option, uo.confirmed, m.dishName AS food_name
            FROM userorder uo
            JOIN menu m ON uo.foodid = m.dishId
            ORDER BY uo.confirmed ASC, uo.date_added DESC";

    $stmt = $db->query($sql);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="FoodDelivery" style="text-align: left; margin-top: 100px;">
                    <span style="color: #DC2F02; font-size: 80px; font-family: Poppins; font-weight: 700; text-transform: capitalize; line-height: 86px; word-wrap: break-word ; ">Food</span>
                    <span style="color: #370617; font-size: 80px; font-family: Poppins; font-weight: 700; text-transform: capitalize; line-height: 86px; word-wrap: break-word"><br/>Delivery</span>
                </div>
                <div class="col">
                    <button class="btn btn-primary mt-3" style="width:200px;" id="generatePdfBtn">Generate PDF</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="Title" id="Orders" style="text-align: left; margin-top: 40px;">Orders</div>
                <div class="row" id="OrdersRow">
                    <?php foreach ($orders as $order): ?>
                        <div class='col'>
                            <div class='card-wrapper'>
                                <div class='card h-100'>
                                    <div class='card-body'>
                                        <div class='card-overlay'>
                                            <span class='<?php echo $order['confirmed'] ? 'delivered' : 'waiting'; ?>'><?php echo $order['confirmed'] ? 'Confirmed' : 'Not Confirmed'; ?></span>
                                        </div>
                                        <h5 class='card-title' style='margin-top: 10px; margin-bottom: 10px;'><?php echo $order['food_name']; ?></h5>
                                        <div class='delivery-option'>Delivery Option: <?php echo $order['delivery_option']; ?></div><br>
                                        <div class='d-flex justify-content-between align-items-center flex-grow-1' style='margin-bottom: 30px;'>
                                            <div class='price'><?php echo $order['total']; ?> DT</div>
                                            <span class='date'><?php echo $order['date']; ?></span>
                                        </div>
                                        <?php if (!$order['confirmed']): ?>
                                            <button class='btn btn-success mt-auto' onclick='confirmOrder(<?php echo $order['id']; ?>)'>Confirm Order</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        const orders = <?php echo json_encode($orders); ?>;

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

        document.getElementById('generatePdfBtn').addEventListener('click', function() {
            generatePDF();
        });
        window.jsPDF = window.jspdf.jsPDF;

        function generatePDF() {
            const doc = new jsPDF();
            let y = 10;

            doc.setFontSize(20);
            doc.text('All the Orders', 105, y, { align: 'center' });
            y += 10;
            orders.forEach(order => {
                doc.setFontSize(12);
                doc.text(`Order ID: ${order.id}`, 10, y);
                doc.text(`Food Name: ${order.food_name}`, 10, y + 10);
                doc.text(`Date: ${order.date}`, 10, y + 20);
                doc.text(`Total: ${order.total} DT`, 10, y + 30);
                doc.text(`Delivery Option: ${order.delivery_option}`, 10, y + 40);
                doc.text(`Confirmed: ${order.confirmed ? 'Confirmed' : 'Not Confirmed'}`, 10, y + 50);
                doc.text(`----------------------------------------------------------`, 10, y + 60);
                y += 70;
                if (y >= doc.internal.pageSize.height - 20) {
                    doc.addPage();
                    y = 10;
                }
            });
            doc.save('orders.pdf');
        }
    </script>
</body>
</html>
