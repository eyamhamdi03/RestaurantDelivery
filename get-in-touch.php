<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="getintouch.css">
  <script src="Script.js" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Contact us</title>
  
</head>
<body>

  <section>
    <img src="assets/image 295.png" alt="">
  </section>
  <section class="section2">
    <div class="section-title">Contact us</div>
    <div class="section-heading">Get in touch with us!</div>
    <form action="https://api.web3forms.com/submit" method="POST" class="form" id="contactForm">
      <input type="hidden" name="access_key" value="e8b5212e-c3ee-4f5a-9a6f-bb59168a6181">
      <input type="text" class="txt" name="Name" placeholder="Your Name">
      <input type="email" class="Email" name="Email" placeholder="Your Email">
      <textarea name="Message" id="msg" cols="30" rows="3" placeholder="Your message"></textarea>
      <button type="submit" class="submit-button">Send Now</button>
    </form>
    <div><a href="homeNormal.php" class="custom-link">X</a></div>
  </section>

  <div id="successMessage" class="success-message" style="display: none;">We have received your email. Thank you for contacting us. We will reply to you as soon as possible!</div>
  <script src="https://web3forms.com/client/script.js" async defer></script>
  <script src="scriptcontactus.js"> </script>
</body>

</html>
