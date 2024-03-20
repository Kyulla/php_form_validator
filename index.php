<!DOCTYPE html>
<html lang="it">

<head>
  <link href="./style.css" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="" />
  <meta name="description" content="mobile-delivery">
  <meta name="keywords" content="delivery, mobile-delivery">
  <meta name="author" content="Alessandro Colla">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <title>Mobile delivery</title>
</head>

<body>
  <?php
  session_start();
  if (!isset ($_SESSION["company-name"])) {
    $_SESSION["company-name"] = true;
  }
  if (!isset ($_SESSION["full-name"])) {
    $_SESSION["full-name"] = true;
  }
  if (!isset ($_SESSION["email"])) {
    $_SESSION["email"] = true;
  }
  if (!isset ($_SESSION["phone"])) {
    $_SESSION["phone"] = true;
  }
  if (!isset ($_SESSION["delivery-method"])) {
    $_SESSION["delivery-method"] = true;
  }
  if (!isset ($_SESSION["sent"])) {
    $_SESSION["sent"] = false;
  }
  ?>
  <div class="delivery-form">
    <h3>Fill the form below</h3>
    <p>Complete the below form to gain complete access.</p>
    <form action="form-validator.php" method="get">
      <p class="error-text" id="company-name-error"></p>
      <input type="text" name="company-name" placeholder="Company name">
      <p class="error-text" id="full-name-error"></p>
      <input type="text" name="full-name" placeholder="Full name">
      <p class="error-text" id="email-error"></p>
      <input type="text" name="email" placeholder="Email">
      <p class="error-text" id="phone-error"></p>
      <input type="text" name="phone" placeholder="Phone">
      <p class="error-text" id="delivery-method-error"></p>
      <select name="delivery-method">
        <option value="not-selected">Choose service...</option>
        <option value="standard">Standard delivery</option>
        <option value="fast">Fast delivery</option>
      </select><br><br>
      <button>Send request</button>
    </form>
</div>
  <script>
    function formError(){
      let company_name = <?php echo($_SESSION["company-name"] ? 'true' : 'false')?>;
      let full_name = <?php echo($_SESSION["full-name"] ? 'true' : 'false')?>;
      let email = <?php echo($_SESSION["email"] ? 'true' : 'false')?>;
      let phone = <?php echo($_SESSION["phone"] ? 'true' : 'false')?>;
      let delivery_method = <?php echo($_SESSION["delivery-method"] ? 'true' : 'false')?>;
      let sent = <?php echo($_SESSION["sent"] ? 'true' : 'false')?>;

      if (company_name) {
        document.getElementById("company-name-error").textContent = "";
      }
      else {
        document.getElementById("company-name-error").textContent = "Company name not valid";
      }

      if (full_name) {
        document.getElementById("full-name-error").textContent = "";
      }
      else {
        document.getElementById("full-name-error").textContent = "Full name not valid";
      }

      if (email) {
        document.getElementById("email-error").textContent = "";
      }
      else {
        document.getElementById("email-error").textContent = "Email not valid";
      }

      if (phone) {
        document.getElementById("phone-error").textContent = "";
      }
      else {
        document.getElementById("phone-error").textContent = "Phone not valid";
      }

      if (delivery_method) {
        document.getElementById("delivery-method-error").textContent = "";
      }
      else {
        document.getElementById("delivery-method-error").textContent = "Delivery method not valid";
      }

      if(sent){
        alert("Request successfully sent.");
        <?php $_SESSION["sent"] = false;?>
      }
    }
    formError();

  </script>
</body>

</html>