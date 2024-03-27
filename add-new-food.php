
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new dish</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="Styles.css">
    <link rel="stylesheet" href="style2login.css">
    <script src="Script.js" defer></script>
    <script src="scriptADD.js"></script>
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
<body>
    <div id="nav-placeholder"></div>
    <div class="Title" id="Orders" style="text-align: center">Add to menu</div>
    <form action="" method="post" class="form"  id="addDishForm" enctype="multipart/form-data" >
        <div class="form-group">
            <div class="text">Dish Name:</div>
            <input type="text" class="form-control" name="dishName" placeholder="Hamburger" style="width: 100%;">
        </div>
        <div class="form-group">
            <div class="text">Dish Price:</div>
            <input type="number" class="form-control" name="dishPrice" placeholder="15" style="width: 100%;">
        </div>
        <div class="form-group">
            <div class="text">Description:</div>
            <input type="text" class="form-control" name="dishPrice" placeholder="Description" cols=30 style="width: 100%;">
        </div>
        <div class="form-group">
            <div class="text">Dish photo:</div>
            <input type="file" class="form-control-file" name="dishPhoto" style="width: 100%;">
        </div>
        <input type="submit" value="Add to menu" class="btn btn-primary">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $dishName = $_POST['dishName'];
        $dishPrice = $_POST['dishPrice'];
        $description = $_POST['description'];

        //check if the select image is clicked or not 
        if (isset($_FILES['dishPhoto']['name'])) {
            $dishPhoto = $_FILES['dishPhoto']['name'];
            if ($dishPhoto !== "") {
                //image is selected
                $ext = explode('.', $dishPhoto);
                $dishPhoto="dishName".rand(0000,9999).".".$ext;
                //src path of the current location of the image
                $src=$_FILES['dishPhoto']['tmp_name'];
                // destination path for the image 
                $dst="assets/food/".$dishPhoto;
                //upload the food image
                $upload=move_uploaded_file($src,$dst);
                if ($upload==false) {
                    $_SESSION['upload']="<div class='error'>Failed to upload image</div>";
                    header('location:'.SITEURL.'add-new-food.php');
                    die();
                }    
            }
            
        } else {
           $dishPhoto=""; // select default value as blanc
        }

        $dishPhoto = $_FILES['dishPhoto']['name'];
        $target = "images/".basename($dishPhoto);
        $db = new PDO('mysql:host=localhost;dbname=restaurant', 'root', '');
        $sql = "INSERT INTO menu
        dishName ='$dishName',
        dishPrice = '$dishPrice',
        description = '$description',
        dishPhoto = '$dishPhoto'";
    //execute the query
       $res =mysqli_query($conn, $sql);
         if ($res==true) {
              $_SESSION['add']="<div class='success'>Dish added successfully</div>";
              header('location:'.SITEURL.'home.php');}
        else{
            $_SESSION['add']="<div class='error'>Failed to add dish</div>";
            header('location:'.SITEURL.'home.php');
        }
    }
    ?>
</body>
<footer class="fixed-bottom">
    <div id="footer-placeholder"></div>
</footer>
</html>
