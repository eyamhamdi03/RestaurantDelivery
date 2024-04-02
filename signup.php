<?php
include("connection.php");
if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $last_name=$_POST['last_name'];
    $Email=$_POST['Email'];
    $Phone=$_POST['Phone'];
    $Password=$_POST['Password'];
    $Confirmation=$_POST['Confirmation'];

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
        if($Password == $Confirmation){
            $hash=password_hash($Password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO signup (`First Name`, `Last Name`, `E-mail Address`, `Phone Number`, `Password`) VALUES ('$nom', '$last_name', '$Email', '$Phone', '$hash')";
            $result=mysqli_query($conn,$sql);
            if ($result){
                header("Location: home.php");
                exit;
            }
        }       
    }
    else{
        if($count_fname > 0 && $count_lname > 0 ){
            echo  '<script>
                window.location.href="signup.php";
                alert("First Name and Last Name already exist !!")
                </script>';
        }
        if($count_email > 0  ){
            echo  '<script>
                window.location.href="signup.php";
                alert("Email already exists !!")
            </script>';
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
            <form action="" method="post" style="align-items: center; text-align: center; margin-top: 0px;">
                <div class="layout">
                    <div class="name">
                        <span class="text">First Name :</span><br>
                        <input class="inpu" type="text" name="nom" size="15" maxlength="30" placeholder="First Name"> <br>
                    </div>
                    <div class="name">
                        <span class="text"> Last Name :</span><br>
                        <input class="inpu" type="text" name="laste-name" size="15" maxlength="30" placeholder="Last Name"> <br>
                    </div>
                </div>
                <div class="layout">
                    <div class="name">
                        <span class="text"> E-mail Address:</span> <br>
                        <input class="inpu" type="email" name="Email" size="15" maxlength="30" placeholder="Email address"> <Br>
                    </div>
                    <div class="name">
                        <span class="text">Phone Number:</span><br>
                        <input class="inpu" type="number" name="Phone" size="15" maxlength="30" placeholder="Phone number"> <Br>
                    </div>
                </div>
                <div class="layout">
                    <div class="name">
                        <span class="text">Password:</span> <br>
                        <input class="inpu" type="password" name="Password" size="15" maxlength="30" placeholder="Password"> <Br>
                    </div>
                    <div class="name">
                        <span class="text">Password Confirmation:</span> <br>
                        <input class="inpu" type="password" name="Confirmation" size="15" maxlength="30" placeholder="Confirm Password"> <Br>
                    </div>
                </div>
                <input type="submit"  value="Create Account" >
            </form>
        </div>
    </div>
    <div><a href="homeNormal.php" class="custom-link">X</a></div>
</body>
</html>

