<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
  <title>Login Page</title>
</head>

<body>
  <div class="container">
    <div class="form-heading">
      <h2>Login Form</h2>
    </div>
    <form action="" method="post">
      <label for="email">Enter email :</label>
      <input type="email" name="email" max="30" required>
      <label for="password">Enter password :</label>
      <div id="pass"><input type="password" name="password" max="20" id="password" required><img class="eye eye-solid" src="<?= ROOT ?>/assets/logo/eye-solid.svg"><img class="eye eye-slash" src="<?= ROOT ?>/assets/logo/eye-slash-solid.svg"></div>

      <input type="submit" name="login" value="Login" id="submit">
      <a href="/GoogleLogin">Login with google</a>
    </form>
    <p id="login-signup-link">Don't have an account <a href="<?= ROOT ?>/signup">SignUp</a></p>
    <p id="login-signup-link">Forgot password? Don't worry <a href="<?= ROOT ?>/forgotpassword">Click here</a></p>
    <p class="error-message"><?= $data['error_msg'] ?></p>
    <p class="success-message"><?= $data['success_msg'] ?></p>
  </div>

  <script src="<?= ROOT ?>/assets/js/signin.js"></script>
</body>

</html>
