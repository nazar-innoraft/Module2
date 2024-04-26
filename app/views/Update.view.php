<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/header.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <title>Home</title>
</head>

<body>
  <!-- Header section -->
  <header>
    <div class="logo">
      <a href="<?php echo ROOT . '/home' ?>">
        <img src="<?= ROOT ?>/assets/logo/logo.png" alt="Logo">
      </a>
    </div>

    <div class="profile">
      <div class="user">
        <a href="<?php echo '/Profile/' . $_SESSION['email'] ?>">
          <img src=<?php
                    $user = $data['image_path'];
                    if (file_exists('assets/profile_images/' . $user)) {
                      echo ROOT . '/assets/profile_images/' . $user;
                    } else {
                      echo ROOT . '/assets/profile_images/user.png';
                    }
                    ?>>
        </a>
        <p class="username"><?= $_SESSION['email'] ?></p>
      </div>
      <a class="logout-btn" href="/logout">Logout</a>
    </div>
  </header>


  <main>
    <div class="container">
      <form action="" method="post">
        <label for="stock_price">Enter Stock Price : </label>
        <input type="number" name="stock_price" id="stock_price">

        <input type="submit" name="submit" id="submit">
      </form>
    </div>
  </main>

</body>

</html>
