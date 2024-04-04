<?php
session_start(); 
include("connection.php");

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
        header("Location: login.php?error=Email is required");
        exit();
    } elseif (empty($password)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $stmt = $conn->prepare("SELECT * FROM signup WHERE `E-mail Address` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if ($row['E-mail Address'] === $email && password_verify($password, $row['Pssword'])) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['loggedIn'] = true; 
                header("Location: homesession.php");
                exit();
            } else {
                header("Location: login.php?error=Incorrect Email or Password");
                exit();
            }
        } else {
            header("Location: login.php?error=Incorrect Email or Password");
            exit();
        }
    }
} else {
    header("Location: login.php?error=Please enter your credentials");
    exit();
} 
?>
