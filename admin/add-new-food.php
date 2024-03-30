<?php
define('SITEURL', 'http://localhost/RestaurantDelivery/Admin/');
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new dish</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles.css">
    <link rel="stylesheet" href="../style2login.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .form {
            width: 400px;
            margin-top: 40px;
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<?php include ('nav.php');?>

<body>
    <div class="Title" id="Orders" style="text-align: center ;margin-top:100px;">Add to menu</div>
    <form action="" method="post" class="form"  id="addDishForm" enctype="multipart/form-data" >
        <div class="form-group">
            <div class="text">Dish Name:</div>
            <input type="text" class="form-control" name="dishName" placeholder="Hamburger" style="width: 100%;">
        </div>
        <div class="form-group">
            <div class="text">Dish Price:</div>
            <input type="number" class="form-control" name="dishPrice" placeholder="15" style="width: 100%;">
        </div>
        <div class="form-group">
            <div class="text">Description:</div>
            <input type="text" class="form-control" name="description" placeholder="Description" cols="30" style="width: 100%;">
        </div>

        <div class="form-group">
            <div class="text">Dish photo:</div>
            <input type="file" class="form-control-file" name="dishPhoto" style="width: 100%;">
        </div>
        <input type="submit" value="Add to menu" name="submit" class="btn btn-primary">
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $dishName = $_POST['dishName'];
    $dishPrice = $_POST['dishPrice'];
    $description = $_POST['description'];

    if (empty($dishName) || empty($dishPrice)) {
        echo '<script>alert("Please fill in all fields.");</script>';
    } else {
        $dishPhoto = "";
        if (isset($_FILES['dishPhoto']['name'])) {
            $fileTmpPath = $_FILES['dishPhoto']['tmp_name'];
            $fileName = $_FILES['dishPhoto']['name'];
            $fileSize = $_FILES['dishPhoto']['size'];
            $fileType = $_FILES['dishPhoto']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = $dishName . rand(0000, 9999) . '.' . $fileExtension;
            $uploadFileDir = 'assets/food/';
            $destPath = $uploadFileDir . $newFileName;    
            } 
        }

        $dsn = 'mysql:host=localhost;dbname=RestaurantDelivery';
        $username = 'root';
        $password = '';
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        );

        try {
            $db = new PDO($dsn, $username, $password, $options);

            $sql = "INSERT INTO menu (dishName, dishPrice, description, dishPhoto) VALUES (:dishName, :dishPrice, :description, :dishPhoto)";
            $stmt = $db->prepare($sql);
            $stmt->execute(array(':dishName' => $dishName, ':dishPrice' => $dishPrice, ':description' => $description, ':dishPhoto' => $dishPhoto));

            echo '<script>alert("Dish added successfully."); window.location.href = "' . SITEURL . 'homeAdmin.php";</script>';
        } catch (PDOException $e) {
            echo '<script>alert("Failed to add dish: ' . $e->getMessage() . '"); window.location.href = "' . SITEURL . 'homeAdmin.php";</script>';
        }
    }
}
?>

    
</body>
</html>