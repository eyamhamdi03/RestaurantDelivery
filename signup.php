<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $nom=$_POST['nom'];
        $last_name=$_POST['last_name'];
        $Email=$_POST['Email'];
        $Phone=$_POST['Phone'];
        $Password=$_POST['Password'];
        $Confirmation=$_POST['Confirmation'];

        $sql="SELECT * FROM signup WHERE 'First Name'='$nom'";
        $result=mysqli_query($conn,$sql);
        $count_fname=mysqli_num_rows($result);

        $sql="SELECT * FROM signup WHERE 'Last Name'='$last_name'";
        $result=mysqli_query($conn,$sql);
        $count_lname=mysqli_num_rows($result);

        $sql="SELECT * FROM signup WHERE 'E-mail Address'='$Email'";
        $result=mysqli_query($conn,$sql);
        $count_email=mysqli_num_rows($result);

        if($count_fname == 0 && $count_lname == 0 && $count_email == 0){
            if($Password == $Confirmation){
                $hash=password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO signup (`First Name`, `Last Name`, `E-mail Address`, `Phone Number`, `Pssword`) VALUES ('$nom', '$last_name', '$Email', '$Phone', '$hash')";
                $result=mysqli_query($conn,$sql);
                if ($result){
                    header("Location : home.php");
                }
            }       
        }
        else{
            if($count_fname > 0 && $count_lname > 0 ){
            echo  '<script>
                window.location.href="signup.php";
                alert("First Name and Last Name  already exist !!")
                </script>';
            }
            if($count_email> 0  ){
            echo  '<script>
                window.location.href="signup.php";
                alert("Email  already exists !!")
        </script>';
        }
    }
}
?>