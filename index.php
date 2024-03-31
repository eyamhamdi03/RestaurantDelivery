<?php
  include("connection.php");
?>  
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="signup.css">
  </head>
  <body>
    <form action="signup.php" method="POST">
    <div id="vector" >
      <div class="col-lg-6" id="photo"></div>
      <div class="col-lg-6" id="formulaire">
      <h1>
       <div class="food">Food</div>
       <div class="Delivery">Delivery</div></h1>
       <div class="layout">
         <div class="name">
           <span class="typo">First Name :</span><br>
         <input class="inpu" type="text" name="nom" size="15" maxlength="30" required > <Br><Br>
         </div>
         <div class="name">
          <span class="typo"> Last Name :</span><br>
           <input class="inpu" type="text" name="last_name" size="15" maxlength="30" required> <br><br>
         </div>
       </div>
    
        <div class="layout">
         <div class="name">
          <span class="typo"> E-mai Address:</span> <br>
           <input class="inpu" type="text" name="Email" size="15" maxlength="30" required> <Br><Br>
         </div>
         <div class="name">
          <span class="typo">Phone Number:</span><br>
          <input class="inpu" type="text" name="Phone" size="15" maxlength="30" required> <Br><Br>
          
         </div>
        </div>
        <div class="layout">
          <div class="name">
            <span class="typo">Pssword:</span> <br>
            <input class="inpu" type="password" name="Password" size="15" maxlength="255" required> <Br><Br>
          </div>
          <div class="name">
            <span class="typo">Pssword Confirmation:</span> <br>
            <input class="inpu" type="password" name="Confirmation" size="15" maxlength="255" required> <Br><Br>
          </div>
        </div>
        <input type="submit"  value="Create Account" name="submit">
    </div>
</form>
  </body>
  </html>