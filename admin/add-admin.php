<!DOCTYPE html>
<?php
define('SITEURL', 'http://localhost/RestaurantDelivery/admin/'); // Adjust the URL as needed
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link rel="stylesheet" href="../Styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
        }

        .form-container {
            width: 30%;
        }

        .form {
            text-align: left;
        }

        .center-button {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <?php include ('nav.php');?>    
    <div class="center">
        <div class="form-container">
            <form action="" method="post" class="form"  id="addAdminForm" enctype="multipart/form-data">
                <div class="Title" id="Orders" style="text-align: center; margin-top: 20px;">Add Admin</div>
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" name="full_name" id="full_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="center-button">
                    <button type="submit" name="submit" class="FillBtn">Add Admin</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $fullName = isset($_POST['full_name']) ? $_POST['full_name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($fullName) || empty($username) || empty($password)) {
        echo '<script>alert("Please fill in all fields.");</script>';
    } else {
        $dsn = 'mysql:host=localhost;dbname=RestaurantDelivery';
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        );

        try {
            $db = new PDO($dsn, 'root', '', $options);

            // Check if the username already exists
            $stmt = $db->prepare("SELECT * FROM Admins WHERE username = :username");
            $stmt->execute(array(':username' => $username));
            $existingUser = $stmt->fetch();

            if ($existingUser) {
                echo '<script>alert("Username already exists. Please choose a different username.");</script>';
            } else {
                // Insert the new admin if the username is not taken
                $sql = "INSERT INTO Admins (full_name, username, password) VALUES (:full_name, :username, :password)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array(':full_name' => $fullName, ':username' => $username, ':password' => $password));

                echo '<script>alert("Admin added successfully."); window.location.href = "' . SITEURL . 'ManageAdmin.php";</script>';
            }
        } catch (PDOException $e) {
            echo '<script>alert("Failed to add admin: ' . $e->getMessage() . '"); window.location.href = "' . SITEURL . 'homeAdmin.php";</script>';
        }
    }
}
?>
