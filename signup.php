<?php
include("connection.php");

$errors = array();

if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $last_name=$_POST['last_name'];
    $Email=$_POST['Email'];
    $Phone=$_POST['Phone'];
    $Password=$_POST['Password'];
    $Confirmation=$_POST['Confirmation'];

    // Password and confirmation match validation
    if ($Password !== $Confirmation) {
        $errors[] = "Password and confirmation do not match.";
    }

    $sql="SELECT * FROM signup WHERE `First Name`='$nom'";
    $result=mysqli_query($conn,$sql);
    $count_fname=mysqli_num_rows($result);

    $sql="SELECT * FROM signup WHERE `Last Name`='$last_name'";
    $result=mysqli_query($conn,$sql);
    $count_lname=mysqli_num_rows($result);

    $sql="SELECT * FROM signup WHERE `E-mail Address`='$Email'";
    $result=mysqli_query($conn,$sql);
    $count_email=mysqli_num_rows($result);

    if($count_fname == 0 && $count_lname == 0 && $count_email == 0){
        if(empty($errors)){
            $hash=password_hash($Password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO signup (`First Name`, `Last Name`, `E-mail Address`, `Phone Number`, `Pssword`) VALUES ('$nom', '$last_name', '$Email', '$Phone', '$hash')";
            $result=mysqli_query($conn,$sql);
            if ($result){
                header("Location: homesession.php");
                exit;
            }
        }       
    }
    else{
        if($count_fname > 0 && $count_lname > 0 ){
            $errors[] = "First Name and Last Name already exist.";
        }
        if($count_email > 0  ){
            $errors[] = "Email already exists.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" type="text/css" href="style2login.css">
    <style>
        body, html {
            height: 100%;
            overflow: hidden;
        }
        .name {
            text-align: left; 
        }
    </style>
</head>
<body>
    <div id="vector">
        <div class="col-lg-6" id="photo" style="align-items: center;"></div>
        <div class="col-lg-6" id="formulaire" >
          <div style="margin-bottom: 0px;margin-top: 30px;display: flex;flex-direction: column;justify-content: center;align-items: center;padding:20px;flex: 1;padding-bottom:0px;">
          <div class="tilte"><span class="food">Food</span>
            <span class="delivery"> <br/> Delivery</span></div>
            <div class="par" style="margin-top: 20px;"><p>Sign up to expire our personalized top picks, tailored just for you.</p></div>
          </div>
          <div style="display: flex; justify-content: center; align-items: center; height: 60px;">
            <?php if(!empty($errors)): ?>
            <div class="alert alert-danger" style="width: 80%; height:60px;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>

            <form action="" method="post" style="align-items: center; text-align: center; margin-top: 0px;">
                <div class="layout">
                    <div class="name">
                        <span class="text">First Name :</span><br>
                        <input class="inpu" type="text" name="nom" size="15" maxlength="30" placeholder="First Name" required> <br>
                    </div>
                    <div class="name">
                        <span class="text"> Last Name :</span><br>
                        <input class="inpu" type="text" name="last_name" size="15" maxlength="30" placeholder="Last Name" required> <br>
                    </div>
                </div>
                <div class="layout">
                    <div class="name">
                        <span class="text"> E-mail Address:</span> <br>
                        <input class="inpu" type="email" name="Email" size="15" maxlength="30" placeholder="Email address" required> <Br>
                    </div>
                    <div class="name">
                        <span class="text">Phone Number:</span><br>
                        <input class="inpu" type="number" name="Phone" size="15" maxlength="30" placeholder="Phone number" required> <Br>
                    </div>
                </div>
                <div class="layout">
                    <div class="name">
                        <span class="text">Password:</span> <br>
                        <input class="inpu" type="password" name="Password" size="15" maxlength="30" placeholder="Password" required> <Br>
                    </div>
                    <div class="name">
                        <span class="text">Password Confirmation:</span> <br>
                        <input class="inpu" type="password" name="Confirmation" size="15" maxlength="30" placeholder="Confirm Password" required> <Br>
                    </div>
                </div>
                <input type="submit" name="submit" value="Create Account" >
            </form>
        </div>
    </div>
    <div><a href="homeNormal.php" class="custom-link">X</a></div>
</body>
</html>
