<?php session_start(); 
include('alreadylogged.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="delivery,food,restaurant,fastfood">
    <link rel="stylesheet" href="style2login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body style="background-color: #FFF2E8;" > 
    
<section>
    <img src="assets/Rectangle 338.png" alt="pizza">
</section>
<section class="section2">
    <div class="tilte"><span class="food">Food</span>
    <span class="delivery"> <br/> Delivery</span></div>
    <div class="par"><p>Sign up or login to expire our personalized top picks, tailored just for you.</p></div>
    <?php
    if (isset($_GET['error'])) {
        echo '<p class="alert alert-danger">' . $_GET['error'] . '</p>';
    }
    ?>
    <form action="loginprocess.php" method="post" class="form">
        <div class="text">Email Address:</div>
        <input type="email" size="100px" name="email" placeholder="GuySimmmons@gmail.com" style="margin-bottom: 0px;">
        <div class="text">Password:</div>
        <input type="password" name="password" placeholder="*********">
        <input type="submit" name="submit" value="Get Started">
    </form>
    <div class="signup"><a href="signup.php" style="color: #DC2F02; text-align: center; margin-left: 120px;">Create new account!</a></div>
</section>
<div><a href="homeNormal.php" class="custom-link">X</a></div>

</body>
</html>
