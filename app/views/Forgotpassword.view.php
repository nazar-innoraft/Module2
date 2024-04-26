<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
  <title>Forgot Password Page</title>
</head>

<body>
  <div class="container">
    <?php
    $show = $data['show_option'] ?? '';
    if ($show == '') :
      $method = $data['method'] ?? '';
      if ($method == 'otp') :
    ?>
        <div class="form-heading">
          <h2>Reset Password otp</h2>
        </div>

        <form method="post">
          <label for="email">Enter email :</label>
          <input type="email" name="email" max="30" required>
          <button id="otp-button" name="get_otp">Get OTP</button>

          <input type="submit" name="submit" value="Reset Password" id="submit">
        </form>
        <p id="login-signup-link">Remember password ? <a href="<?= ROOT ?>/signup">Login</a></p>
      <?php
      else :
      ?>
        <div class="form-heading">
          <h2>Reset Password with token</h2>
        </div>
        <form method="post">
          <label for="email">Enter email :</label>
          <input type="email" name="email" max="30" required>

          <input type="submit" name="reset_link" value="Send Reset Link" id="submit">
        </form>
        <p id="login-signup-link">Remember password ? <a href="<?= ROOT ?>/signup">Login</a></p>

      <?php
      endif;
    else :
      ?>
      <h2>Chose an option :</h2>
      <div>
        <a href="/Forgotpassword/updateWithOtp">Reset with OTP</a> <br>
        <a href="/Forgotpassword/updateWithToken">Reset with Token</a>
      </div>
    <?php
    endif;
    ?>
    <p class="error-message"><?= $data['error_msg'] ?? '' ?></p>
    <p class="success-message"><?= $data['success_msg'] ?? '' ?></p>
  </div>

  <script src="<?= ROOT ?>/assets/js/signin.js"></script>
</body>

</html>
