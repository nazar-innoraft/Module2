<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
  <title>Reset Password Page</title>
</head>

<body>
  <div class="container">
    <form method="post">
      <input type="hidden" name="token" id="token" value="<?= $data['token'] ?>">
      <input type="text" name="password" id="pass" placeholder="Enter password">
      <input type="password" name="c_password" id="c_password" placeholder="Confirm password">
      <input type="submit" name="reset" id="reset" value="Update Password">
    </form>
    <p class="error-message"><?= $data['error_msg'] ?? '' ?></p>
    <p class="success-message"><?= $data['success_msg'] ?? '' ?></p>
  </div>

  <script src="<?= ROOT ?>/assets/js/signin.js"></script>
</body>

</html>
