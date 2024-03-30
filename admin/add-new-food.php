
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

<body style = "margin-bottom : 30px">
    <div class="Title" id="Orders" style="text-align: center ;margin-top:100px;">Add to menu</div>
    <form action="" method="post" class="form"  id="addDishForm" enctype="multipart/form-data" >
        <div class="form-group">
            <div class="text">Dish Name:</div>
            <input type="text" class="form-control" name="dishName" placeholder="Hamburger" style="width: 100%;">
        </div>
        <div class="form-group">
            <div class="text">Dish Price:</div>
            <input type="number" class="form-control" name="dishPrice" placeholder="15" style="width: 100%;" required>
        </div>
        <div class="form-group">
            <div class="text">Description:</div>
            <input type="text" class="form-control" name="description" placeholder="Description" cols="30" style="width: 100%;" required>
        </div>

        <div class="form-group">
            <div class="text">Dish photo:</div>
            <input type="file" class="form-control-file" name="dishPhoto" style="width: 100%;">
        </div>
        <input type="submit" value="Add to menu" name="submit" class="btn btn-primary">
    </form>
    <?php
if (isset($_POST['submit'])) {
    $dishName = $_POST['dishName'];
    $dishPrice = $_POST['dishPrice'];
    $description = $_POST['description'];

    // Check if an image is selected
    if (isset($_FILES['dishPhoto']['name']) && $_FILES['dishPhoto']['name'] !== "") {
        $dishPhoto = $_FILES['dishPhoto']['name'];
        $ext = pathinfo($dishPhoto, PATHINFO_EXTENSION);
        $newFileName = $dishName . rand(0000, 9999) . "." . $ext;
        $src = $_FILES['dishPhoto']['tmp_name'];
        $dst = "assets/food/" . $newFileName;

        // Upload the image
        if (!move_uploaded_file($src, $dst)) {
            $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
            header('location: add-new-food.php');
            die();
        }
    } else {
        $dishPhoto = ""; // Set default value to blank
    }

    // Create a PDO connection
    $dsn = 'mysql:host=localhost;dbname=RestaurantDelivery';
    $username = 'root';
    $password = '';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    );

    try {
        $db = new PDO($dsn, $username, $password, $options);

        // Prepare and execute the SQL query
        $sql = "INSERT INTO menu (dishName, dishPrice, description, dishPhoto) VALUES (:dishName, :dishPrice, :description, :dishPhoto)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(':dishName' => $dishName, ':dishPrice' => $dishPrice, ':description' => $description, ':dishPhoto' => $newFileName));

        $_SESSION['add'] = "<div class='success'>Dish added successfully</div>";
        header('location: homeAdmin.php');
        exit();
    } catch (PDOException $e) {
        $_SESSION['add'] = "<div class='error'>Failed to add dish: " . $e->getMessage() . "</div>";
        exit();
    }
}
?>
</body>
</html>