<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="Styles.css">
    <script src="Script.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1529 848" fill="none" class="svg-background">
        <g filter="url(#filter0_d_3_4691)">
            <path d="M1528.62 0V781C1394.57 846.2 1270.91 636 1043.41 699.5C1043.41 699.5 751.759 781 621.84 590C621.84 590 514.722 415 285.64 548C285.64 548 93.1469 619 -0.182983 498V0H1528.62Z" fill="white"/>
        </g>
    </svg>

    <?php include ('nav.php');?>
    <div id="nav-placeholder"></div>
    
    <section>
        <div class="row" id="row1">
            <div class="col">
                <div class="FoodDelivery" style="width: 100%; height: 100%">
                    <span style="color: #DC2F02; font-size: 80px; font-family: Poppins; font-weight: 700; text-transform: capitalize; line-height: 86px; word-wrap: break-word">Food</span>
                    <span style="color: #370617; font-size: 80px; font-family: Poppins; font-weight: 700; text-transform: capitalize; line-height: 86px; word-wrap: break-word"><br/>Delivery</span>
                </div>
            </div>
            <div class="col">
                <img class="Hamburger" src="assets/Hamburger.jpg" />
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 40px;">
            <div class="col-auto">
                <button class="FillBtn">Get Started</button>
            </div>
            <div class="col-auto">
                <button class="OffBtn">Create Account</button>
            </div>
        </div>
        

        <div class="row">
            <div class="col">
                <img src="assets/scroll down.png" style="margin-top: 20px;">
            </div>
        </div>        
        <img src="assets/decor2.png" class="decor-img">
         <?php 
         $sql = "SELECT * FROM menu";  

         $res=mysqli_query($conn,$sql);
         $count = mysqli_num_rows($res);        
         if($count>0){
             while($row=mysqli_fetch_assoc($res)){
                 $id = $row['dishId'];
                 $name = $row['dishName'];
                 $price = $row['dishPrice'];
                 $description = $row['Description'];
                 $photo = $row['photo'];
                 ?>
            <div class="card-wrapper">
                <div class="card">
                    <?php
                    if ($photo == "") {
                        $photo = "assets/food.jpg";
                    } else {
                        $photo = "uploads/" . $photo;
                    }
                    ?>
                    <img src=<?php echo $photo?> class="card-img-top" alt="Food Photo">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="review">
                                <span class="text-muted">Dining & Delivery</span>
                            </div>
                            <div class="price"><?php echo $price ?></div>
                        </div>
                        <h5 class="card-title" style="margin-top: 10px; margin-bottom: 10px;"><?php echo $name ?></h5>
                        <p class="text-muted"><?php echo $description ?></p>
                        <a href="#" class="${userStatus === 'admin' ? 'btn-danger' : 'btn-primary'} btn" onclick="handleclick(event)">${userStatus === 'admin' ? 'Delete' : 'Order Now !'}</a>
                    </div>
                </div>
            </div>
        

        else
        {
            echo "<div class="alert alert-danger">No food available</div>"
        }
         
         
         ?>
        <div class="container">
            <div class="Title" id = "Menu">Our Menu</div> 
            <div class="row" id="menuRow"></div>
        </div>
        
</body>
<?php include ('footer.php');?>
</html>
