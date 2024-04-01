<?php
include("connection.php");
if (isset($_POST['email']) && isset($_POST['password'])){
    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $email=validate($_POST['email']);
    $password=validate($_POST['password']);

    if (empty($email)){
        header("Location: login.php?error=Email is required");
        exit();
    }else if(empty($password)){
        header("Location: login.php?error=Password is required");
        exit();
    }else{
        
        $sql = "SELECT * FROM signup WHERE `E-mail Address`='$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['E-mail Address'] === $email && password_verify($password, $row['Pssword'])) {
                $_SESSION['email'] = $row['E-mail Address'];
                $_SESSION['Fname'] = $row['First Name'];
                $_SESSION['Lname'] = $row['Last Name'];
                $_SESSION['id'] = $row['id'];
                header("Location: homesession.php");
                exit();
          
        
            }else{
                header("Location: login.php?error=Incorect Email or Password");
                exit();
            }
        }else{
            header("Location: login.php?error=Incorect Email or Password");
            exit();
        }
    }
}else{
    header("Location: homeNormal.php");
    exit();
}
?> 
