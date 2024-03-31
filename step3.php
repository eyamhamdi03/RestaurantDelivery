<?php include('foodid.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title id="head">Confirmation</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="confirmation.css">
    </head>
    <body>
        <nav id="navigation">
            <div class="restaurant-name">Restaurant Name</div>
            <div class="menu-items">
            <a href="../home.html">Home</a>
            <a href="#" style=" pointer-events: none; color: rgb(101, 98, 98); text-decoration: none;">Your Orders</a>
            <a href="../get-in-touch.html">Contact Us</a>
            <a href="../login.html">Logout</a>
            </div>
        </nav>
        <div class="container">
            <div class="step"> 
                <p>01</p>
                <h4>DELIVERY</h4>
            </div>
            <div class="step"> 
              <p>02</p>
              <h4>PAYMENT</h4>
            </div>
 
         <div class="step active"> 
          <p>03</p>
          <h4>CONFIRM</h4>
         </div>
        </div>
        <div id="photo"></div>
        <div class="frame">
            <svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" viewBox="0 0 160 160" fill="none">
                <path d="M137.143 74.7754V80.0325C137.136 92.3549 133.146 104.345 125.767 114.214C118.389 124.084 108.019 131.304 96.2018 134.798C84.3851 138.291 71.7556 137.872 60.1968 133.602C48.638 129.331 38.7692 121.439 32.0624 111.101C25.3556 100.764 22.17 88.5357 22.9808 76.24C23.7916 63.9443 28.5553 52.2401 36.5614 42.8729C44.5675 33.5058 55.3871 26.9775 67.4066 24.2619C79.426 21.5463 92.0013 22.7887 103.257 27.8039M137.143 34.3183L79.9998 91.5183L62.8569 74.3754" stroke="#999999" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <div id="mabrouk">
              <div id="congratulaions">congratulations!</div>
              <div id="phrase">Your Order is Accepted</div></div>
              <div id="jomla">
                <p id="fine">Thank you so much for purchase! Your order should <br>
                    arrive shortly . You can track if your order is delivered .</p>
              </div>
            </div>
            <input type="submit" href="#" value="Track your Order">
         </div>
        </div>
        <div id="photo2"></div>
    </body>
</html>
