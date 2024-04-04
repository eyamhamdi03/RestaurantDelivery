<?php
include("connection.php");
session_start();
if ( isset($_SESSION['loggedIn'])) {
    $userId = $_SESSION['id'];
    $sql = "SELECT `First Name`, `Last Name` FROM signup WHERE id = $userId"; 
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstName = $row['First Name'];
        $lastName = $row['Last Name'];
        echo "Welcome, $firstName $lastName!";
            echo "<script>
                setTimeout(function() {
                    window.location.href = 'homeNormal.php';
                }, 1000); // 1000 milliseconds = 1 second
              </script>";
        exit();
    } else {
        echo "This user does not exist";
            echo "<script>
                setTimeout(function() {
                    window.location.href = 'login.php';
                }, 1000); // 1000 milliseconds = 1 second
              </script>";
        exit();
    }
} else {
    echo "You should log in first";
    echo "<script>
            setTimeout(function() {
                window.location.href = 'login.php';
            }, 1000); // 1000 milliseconds = 1 second
          </script>";
    exit();
}
?>
