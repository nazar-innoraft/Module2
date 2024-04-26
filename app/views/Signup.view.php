<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
  <title>SignUp Page</title>
</head>

<body>
  <div class="container">
    <div class="form-heading">
      <h2>Sign Up Form</h2>
    </div>
    <form action="/signup/signup" method="post" enctype="multipart/form-data">
      <label for="first_name">Enter First Name :</label>
      <input type="text" name="first_name" pattern="[A-Za-z]+">

      <label for="last_name">Enter Last Name :</label>
      <input type="text" name="last_name" pattern="[A-Za-z]+">

      <label for="email">Enter email :</label>
      <input type="email" name="email" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,}$">

      <label for="phone">Enter phone number :</label>
      <input type="tel" name="phone" pattern="^\+91[6-9]{1}[2-9]{1}[0-9]{8}">

      <p class="white">Select Image : </p>
      <label for="imageFile"><img width="30px" src="<?php ROOT ?>/assets/images/image-icon.png"></label>
      <input onchange="readURL(this);" style="display: none;" type="file" name="imageFile" id="imageFile">
      <img style="width: 100px; border-radius: 5px;" src="" id="imagePreview">

      <label for="password">Enter password :</label>
      <input type="password" name="password" id="pass">

      <label for="c_password">Enter confirm password :</label>
      <input type="password" name="c_password" id="c_pass">
      <input type="submit" name="sign_up" value="Sign Up" id="submit">
      <p id="wrong"></p>
    </form>
    <a href="/GoogleLogin">Signup with google</a>
    <p id="login-signup-link">Already a user <a href="<?= ROOT ?>/login">Login</a></p>
    <p class="error-message"><?= $data['error_message'] ?? '' ?></p>
    <p class="success-message"><?= $data['success_message'] ?? '' ?></p>
  </div>

  <script src="<?= ROOT ?>/assets/js/signup.js"></script>
</body>

</html>
