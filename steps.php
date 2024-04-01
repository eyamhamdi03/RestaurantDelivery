<div class="container">
    <div class="<?php echo (strpos($_SERVER['SCRIPT_NAME'], '/order.php') !== false || (strpos($_SERVER['SCRIPT_NAME'], '/payment.php') !== false || strpos($_SERVER['SCRIPT_NAME'], '/step3.php') !== false)) ? 'active' : 'inactive'; ?>"> 
        <div class="circle">01</div>
        <h4>DELIVERY</h4>
    </div>
    <div class="<?php echo (strpos($_SERVER['SCRIPT_NAME'], '/payment.php') !== false || strpos($_SERVER['SCRIPT_NAME'], '/step3.php') !== false) ? 'active' : 'inactive'; ?>"> 
        <div class="circle">02</div>
        <h4>PAYMENT</h4>
    </div>
    <div class="<?php echo (strpos($_SERVER['SCRIPT_NAME'], '/step3.php') !== false) ? 'active' : 'inactive'; ?>"> 
        <div class="circle">03</div>
        <h4>CONFIRM</h4>
    </div>
</div>

<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        left:500px;
    position:absolute;
    top:100px;
     width: 500px;
  height: 60px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-radius: 5px;

    }
.active, .inactive {
    text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        margin: 10px;}
    

    .circle {
        width: 50px;
        height: 50px;
        background: #FC8019;
        border-radius: 50%;
        color: white;
        font-size: 17px;
        font-family: Roboto;
        font-weight: 400;
        line-height: 50px;
        opacity: 0.7; 
    }

    .active .circle {
        opacity: 1; 
    
    }

h4 {
        margin-top: 10px; 
        width: 100px;
        font-size: 12px;
        color: #151522;
        font-family: "SF Pro Text", sans-serif;
        font-weight: 300; 
        text-transform: uppercase;
        line-height: 16px;
        word-wrap: break-word;
    }
</style>
