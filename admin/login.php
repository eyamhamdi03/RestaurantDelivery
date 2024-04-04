<!DOCTYPE html>
<html lang="fr">
<head>
    <title>login-admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="delivery,food,restaurant,fastfood">
    <link rel="stylesheet" href="../style2login.css">
    <link rel="stylesheet" href="../Styles.css">
</head>
<body>
    
    <section>
        <img src="../assets/Rectangle 338.png" alt="pizza">
    </section>
    <section class="section2">
        <div class="tilte"><span class="food">Food</span>
        <span class="delivery"> <br/> Delivery</span></div>
        <div class="par"><p>Welcome Again Admin!</p></div>
        <form action="" method="post" class="form">
            <div class="text">Username:</div>
            <input type="text" size="100px" name="username" placeholder="GuySimmmons" style="margin-bottom: 0px;" required>
            <div class="text">Password:</div>
            <input type="password" name="password" placeholder="*********" required>
            <input type="submit" name="submit" value="Get Started">
        </form>
    </section>

</body>
</html>

<?php
session_start(); // Start the session
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Process for login
    // Get the data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = new PDO("mysql:host=localhost;dbname=RestaurantDelivery", "root", "");

    // Prepare the SQL query to check whether the user with username exists
    $sql = "SELECT * FROM Admins WHERE username=:username";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['username' => $username]);

    // Fetch the result
    $user = $stmt->fetch();

    // Verify the password
    if ($user && $password === $user['password']) {
        // Password is correct
        $_SESSION['login'] = "success";
        $_SESSION['user'] = $username;
        header("Location: homeAdmin.php");
    } else {
        // Password is incorrect
        $_SESSION['login'] = "error";
        echo "<script>alert('Username or Password did not match');</script>";
    }
}
?>
